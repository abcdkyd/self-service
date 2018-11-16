<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/10/31
 * Time: 下午3:39
 */

namespace Notadd\Product\Service\ZYB\Traits;


trait Core
{
    public function config()
    {
        try {
            $config = [];
            $files = $this->getConfFileName(__DIR__ . '/../Config');
        } catch (\Exception $e) {
            throw new \Exception('config error');
        }

        foreach ($files as $file) {
            $include = include_once "{$file['path']}";
            if (is_array($include)) $config[$file['name']] = $include;
        }

        return $config;
    }

    protected function getConfFileName($dir)
    {
        $handle = opendir($dir);
        $files = [];

        while (($file = readdir($handle)) !== false) {
            if ($file !== '.' && $file !== '..') {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $file)) {
                    $files = array_merge_recursive($files, $this->getConfFileName($dir . DIRECTORY_SEPARATOR . $file));
                } else {
                    $file_arr = explode('.', $file);
                    $file_suffix = end($file_arr);
                    if ($file_suffix !== 'php') continue;

                    $files[] = [
                        'name' => str_replace('.php', '', $file),
                        'path' => $dir . DIRECTORY_SEPARATOR . $file,
                    ];
                }
            }
        }
        return $files;
    }

    private function encrypt($data)
    {
        $config = $this->config;
        $key = $config['Config']['ZYB']['carLoans']['AES-KEY'];
        return openssl_encrypt($data, 'AES-128-ECB', $key);
    }

    private function decrypt($data)
    {
        $config = $this->config;
        $key = $config['Config']['ZYB']['carLoans']['AES-KEY'];
        return openssl_decrypt($data, 'AES-128-ECB', $key);
    }

    protected function response($message, $status, $data = null)
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }

    protected function checkXml($key, $data)
    {
        $config = $this->config;
        if (!isset($config[$key])) return $this->response('<' . $key . '>该配置不存在', 'error');

        $message = '<' . $key . '>参数校验成功';
        $status = 'success';

        try {
            foreach ($config[$key]['PARAMS']['INPUT'] as $conf) {
                if ($conf['is_required'] == true) {
                    if (!isset($data[$conf['key']])) {
                        $message = '<' . $key . '>缺少参数：' . $conf['key'];
                        $status = 'error';
                        break;
                    }

                    if (!call_user_func('is_' . $conf['type'], $data[$conf['key']])) {
                        $message = '<' . $key . '>参数' . $conf['key'] . '的类型需为：' . $conf['type'];
                        $status = 'error';
                        break;
                    }

                    // 字符类型判断
                    if ($conf['type'] == 'string') {
                        if (strlen($data[$conf['key']]) > $conf['len'] || strlen($data[$conf['key']]) <= 0) {
                            $message = '<' . $key . '>参数' . $conf['key'] . '的长度不正确';
                            $status = 'error';
                            break;
                        }
                    }

                    // 数组类型判断
                    if ($conf['type'] == 'array') {
                        foreach ($conf['child'] as $conf_child) {
                            if ($conf_child['is_required'] == true) {
                                foreach ($data[$conf['key']] as $data_child_key => $data_child_val) {

                                    if (!is_array($data_child_val)) {
                                        $message = "<{$key}>缺少参数：{$conf['key']}需为循环节点，子项要为数组";
                                        $status = 'error';
                                        break 3;
                                    }

                                    if (!isset($data_child_val[$conf_child['key']])) {
                                        $message = "<{$key}>缺少参数：{$conf['key']}[{$data_child_key}].{$conf_child['key']}";
                                        $status = 'error';
                                        break 3;
                                    }

                                    if (!call_user_func('is_' . $conf_child['type'], $data_child_val[$conf_child['key']])) {
                                        $message = "<{$key}>参数{$conf['key']}[{$data_child_key}].{$conf_child['key']}的类型需为：{$conf_child['type']}";
                                        $status = 'error';
                                        break 3;
                                    }

                                    if ($conf_child['type'] == 'string') {
                                        if (strlen($data_child_val[$conf_child['key']]) > $conf_child['len'] || strlen($data_child_val[$conf_child['key']]) <= 0) {
                                            $message = "<{$key}>参数{$conf['key']}[{$data_child_key}].{$conf_child['key']}的长度不正确";
                                            $status = 'error';
                                            break 3;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $message = '<' . $key . '>校验参数异常：' . $e->getMessage();
            $status = 'error';
        }

        return $this->response($message, $status);
    }

    protected function makeXml($key, $data, $alias = '')
    {
        $config = $this->config;
        if (!isset($config[$key])) return $this->response('<' . $key . '>该配置不存在', 'error');
        if (empty($data)) return $this->response('<' . $key . '>输入参数不能为空', 'error');

        try {
            $config_input = $config[$key]['PARAMS']['INPUT'];
            $label = $alias ?: $key;

            $xml = '';
            $xml .= "<{$label}>";
            foreach ($data as $d_key => $d_val) {
                if (!isset($config_input[$d_key])) continue;
                if ($config_input[$d_key]['type'] == 'array') {

                    foreach ($d_val as $d_key_2 => $d_val_2) {
                        $xml_ = '';
                        foreach ($d_val_2 as $d_key_3 => $d_val_3) {
                            if (!isset($config_input[$d_key]['child'][$d_key_3])) continue;
                            $xml_ .= "<{$d_key_3}>{$d_val_3}</{$d_key_3}>";
                        }
                        $xml .= "<{$d_key}>{$xml_}</{$d_key}>";
                    }
                } else {
                    $xml .= "<{$d_key}>{$d_val}</{$d_key}>";
                }
            }
            $xml .= "</{$label}>";
            return $this->response('<' . $key . '>xml获取成功', 'success', $xml);
        } catch (\Exception $e) {
            return $this->response('<' . $key . '>xml获取异常：' . $e->getMessage(), 'error');
        }
    }

    protected function getXml($key, $data, $alias = '')
    {
        $checkXml = $this->checkXml($key, $data);
        if ($checkXml['status'] == 'error') {
            return $checkXml;
        }
        return $this->makeXml($key, $data, $alias);
    }
}