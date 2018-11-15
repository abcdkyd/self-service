<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/10/31
 * Time: 下午5:26
 */
return [
    'TRAN_CODE' => 'MPP02MPP003',
    'TRAN_NO' => 'HNJHPM_0001',
    'TRAN_NAME' => '车贷客户信息推送',
    'TRAN_METHOD' => 'post',
    'PARAMS' => [
        'INPUT' => [
            'CNAME' => [
                'key' => 'CNAME',
                'name' => '客户姓名',
                'type' => 'string',
                'len' => 100,
                'is_required' => true,
                'is_sign' => false,
            ],
            'CPHONE' => [
                'key' => 'CPHONE',
                'name' => '客户手机号',
                'type' => 'string',
                'len' => 20,
                'is_required' => true,
                'is_sign' => false,
            ],
            'CERTTYPE' => [
                'key' => 'CERTTYPE',    // "参考数据字典中CERTTYPE 目前只支持Ind01-身份证"
                'name' => '证件类型',
                'type' => 'string',
                'len' => 10,
                'is_required' => false,
                'is_sign' => false,
            ],
            'CIDCARD' => [
                'key' => 'CIDCARD',
                'name' => '证件号',
                'type' => 'string',
                'len' => 32,
                'is_required' => false,
                'is_sign' => false,
            ],
            'CSEX' => [
                'key' => 'CSEX',    // 1-男，2-女，9-未说明性别
                'name' => '性别',
                'type' => 'string',
                'len' => 10,
                'is_required' => false,
                'is_sign' => false,
            ],
            'CITYID' => [
                'key' => 'CITYID',    // 国标码,见数据字典页AreaCode
                'name' => '购车城市(码值)',
                'type' => 'string',
                'len' => 20,
                'is_required' => true,
                'is_sign' => false,
            ],
            'CITYNAME' => [
                'key' => 'CITYNAME',
                'name' => '购车城市名称',
                'type' => 'string',
                'len' => 200,
                'is_required' => true,
                'is_sign' => false,
            ],
            'ENTRYCHANNEL' => [
                'key' => 'ENTRYCHANNEL',    // JF-金服APP直客  SJYH-手机银行 PHT-普惠通
                'name' => '进件渠道',
                'type' => 'string',
                'len' => 4,
                'is_required' => true,
                'is_sign' => false,
            ],
            'BRANDID' => [
                'key' => 'BRANDID',
                'name' => '购车品牌ID',
                'type' => 'string',
                'len' => 50,
                'is_required' => false,
                'is_sign' => false,
            ],
            'BRANDNAME' => [
                'key' => 'BRANDNAME',
                'name' => '购车品牌名称',
                'type' => 'string',
                'len' => 100,
                'is_required' => true,
                'is_sign' => false,
            ],
            'SERIESID' => [
                'key' => 'SERIESID',
                'name' => '购车车型',
                'type' => 'string',
                'len' => 50,
                'is_required' => false,
                'is_sign' => false,
            ],
            'SERIESNAME' => [
                'key' => 'SERIESNAME',
                'name' => '购车车型名称',
                'type' => 'string',
                'len' => 200,
                'is_required' => true,
                'is_sign' => false,
            ],
            'C_SERIALNO' => [
                'key' => 'C_SERIALNO',
                'name' => '渠道方流水号',
                'type' => 'string',
                'len' => 32,
                'is_required' => true,
                'is_sign' => false,
            ],
            'RFNAME' => [
                'key' => 'RFNAME',
                'name' => '客户经理工号',
                'type' => 'string',
                'len' => 50,
                'is_required' => false,
                'is_sign' => false,
            ],
            'TELLERIDCARD' => [
                'key' => 'TELLERIDCARD',    // 渠道为手机银行时必输
                'name' => '录入人证件号',
                'type' => 'string',
                'len' => 32,
                'is_required' => false,
                'is_sign' => false,
            ],
        ],
        'OUTPUT' => [
            'M_SERIALNO' => [
                'key' => 'M_SERIALNO',
                'name' => '流水号',
                'type' => 'string',
                'len' => 32,
                'is_required' => true,
                'is_sign' => false,
            ]
        ]
    ]
];