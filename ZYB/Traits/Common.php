<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/11/5
 * Time: 上午9:51
 */

namespace Notadd\Product\Service\ZYB\Traits;


trait Common
{
    protected function getRequestXml($apiName, $requestData)
    {
        $headerBuilder = $this->getXml('Sys_Head', $requestData);
        if ($headerBuilder['status'] == 'error') return $headerBuilder;

        $bodyBuilder = $this->getXml($apiName, $requestData, 'Body');
        if ($bodyBuilder['status'] == 'error') return $bodyBuilder;

        $header = $headerBuilder['data'];
        $body = $bodyBuilder['data'];

        $xml = '';
        $xml .= "<?xml version='1.0' encoding='UTF-8'?>";
        $xml .= '<Message>';
        $xml .= $header;
        $xml .= $body;
        $xml .= '</Message>';

        return $this->response('获取请求xml成功', 'success', $xml);
    }

}