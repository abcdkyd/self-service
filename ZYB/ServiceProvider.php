<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/10/31
 * Time: 下午3:54
 */

namespace Notadd\Product\Service\ZYB;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Notadd\Product\Service\ZYB\Traits\Common;
use Notadd\Product\Service\ZYB\Traits\Core;

class ServiceProvider
{
    use Core, Common;

    protected $config;
    protected $module;
    protected $client;

    public function __construct($module)
    {
        $this->module = $module;
        $this->config = $this->config();
        $this->client = new Client();
    }

    public function dispatch($apiName, $requestData, $method = 'POST')
    {
        Log::info("==== 中原银行接口：{$apiName} start ====");

        $requestXmlBuilder = $this->getRequestXml($apiName, $requestData);
        if ($requestXmlBuilder['status'] == 'error') return $requestXmlBuilder;

        $requestXml = $requestXmlBuilder['data'];

        Log::info("中原银行接口（{$apiName}）请求参数为：{$requestXml}");

        try {
            $client = $this->client->request(
                $method,
                $this->config['Config']['ZYB']['carLoans']['server-url'],
                [
                    'body' => $this->encrypt($requestXml),
                    'cert' => [$this->config['Config']['ZYB']['carLoans']['ssl-cert'], $this->config['Config']['ZYB']['carLoans']['cert-pass']],
                    'ssl_key' => $this->config['Config']['ZYB']['carLoans']['ssl-key'],
                    'verify' => false,
                ]
            );

            $resultXml = $this->decrypt($client->getBody()->getContents());
            $result = json_decode(json_encode(simplexml_load_string($resultXml)), true);

            $resultHead = $result['Sys_Head'] ?? [];
            $resultBody = $result['Body'] ?? [];

            $ret_code = $resultHead['RET_ARRAY']['Row']['RET_CODE'];
            $ret_msg = $resultHead['RET_ARRAY']['Row']['RET_MSG'];

            $resultHead['RET_CODE'] = $ret_code;
            $resultHead['RET_MSG'] = $ret_msg;
            unset($resultHead['RET_ARRAY']);

            $data = [
                'head' => $resultHead,
                'body' => $resultBody
            ];

            if ($resultHead['RET_STATUS'] != 'S') {
                Log::error("中原银行接口（{$apiName}）返回码：{$ret_code}，{$ret_msg}");
                Log::error("中原银行接口（{$apiName}）返回xml：{$resultXml}");
                Log::info("==== 中原银行接口：{$apiName} end ====");
                $message = isset($this->config['DataMap']['ERRORCODE'][$ret_code]) ?
                    $this->config['DataMap']['ERRORCODE'][$ret_code]['label'] : '请求失败';
                return $this->response($message . '：' . $ret_msg, 'error', $data);
            }

            Log::info("==== 中原银行接口：{$apiName} end ====");
            return $this->response('请求成功', 'success', $data);
        } catch (\Exception $e) {
            Log::error("中原银行接口（{$apiName}）异常：" . $e->getMessage());
            Log::info("==== 中原银行接口：{$apiName} end ====");
            return $this->response('请求失败', 'error');
        }
    }
}