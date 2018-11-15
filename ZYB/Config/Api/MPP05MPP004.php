<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/11/14
 * Time: 下午5:27
 */

return [
    'TRAN_CODE' => 'MPP02MPP003',
    'TRAN_NO' => 'HNJHPM_0001',
    'TRAN_NAME' => '车贷客户信息推送',
    'TRAN_METHOD' => 'post',
    'PARAMS' => [
        'INPUT' => [
            'APPLIST' => [
                'key' => 'APPLIST',
                'name' => '渠道方流水号',
                'type' => 'array',
                'is_required' => true,
                'child' => [
                    'C_SERIALNO' => [
                        'key' => 'C_SERIALNO',
                        'name' => '渠道方流水号',
                        'type' => 'string',
                        'len' => 32,
                        'is_required' => true,
                        'is_sign' => false,
                    ],
                ]
            ],
        ],
        'OUTPUT' => []
    ]
];