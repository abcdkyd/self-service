<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/11/5
 * Time: 上午11:00
 */
return [
    'TRAN_CODE' => 'Sys_Head',
    'TRAN_NO' => 'Sys_Head',
    'TRAN_NAME' => '公共头部',
    'TRAN_METHOD' => '',
    'PARAMS' => [
        'INPUT' => [
            'TRAN_CODE' => [
                'key' => 'TRAN_CODE',
                'name' => '交易码',
                'type' => 'string',
                'len' => 11,
                'is_required' => true,
                'is_sign' => true,
            ],
            'SEQ_NO' => [
                'key' => 'SEQ_NO',      // 唯一标识一笔交易，一天之内不能重复
                'name' => '流水号',
                'type' => 'string',
                'len' => 20,
                'is_required' => true,
                'is_sign' => true,
            ],
            'CHL_ID' => [
                'key' => 'CHL_ID',      // 识别第三方身份：HNJHPM0000
                'name' => '请求方身份ID',
                'type' => 'string',
                'len' => 10,
                'is_required' => true,
                'is_sign' => true,
            ],
            'TRAN_DATE' => [
                'key' => 'TRAN_DATE',   // YYYYMMDD
                'name' => '交易日期',
                'type' => 'string',
                'len' => 8,
                'is_required' => true,
                'is_sign' => true,
            ],
            'TRAN_TIMESTAMP' => [
                'key' => 'TRAN_TIMESTAMP',  // HHMMSSNNN
                'name' => '交易时间',
                'type' => 'string',
                'len' => 9,
                'is_required' => true,
                'is_sign' => true,
            ],
            'SOURCE_BRANCH_NO' => [
                'key' => 'SOURCE_BRANCH_NO',
                'name' => '源节点编号',
                'type' => 'string',
                'len' => 40,
                'is_required' => false,
                'is_sign' => true,
            ],
            'DEST_BRANCH_NO' => [
                'key' => 'DEST_BRANCH_NO',
                'name' => '目标节点编号',
                'type' => 'string',
                'len' => 40,
                'is_required' => false,
                'is_sign' => true,
            ],
            'TRAN_MODE' => [
                'key' => 'TRAN_MODE',
                'name' => '交易模式',
                'type' => 'string',
                'len' => 10,
                'is_required' => false,
                'is_sign' => true,
            ],
            'VERSION' => [
                'key' => 'VERSION',
                'name' => '版本号',
                'type' => 'string',
                'len' => 5,
                'is_required' => false,
                'is_sign' => true,
            ],
            'SIGNATURE' => [
                'key' => 'SIGNATURE',
                'name' => '数字签名',
                'type' => 'string',
                'len' => 128,
                'is_required' => false,
                'is_sign' => true,
            ],
        ],
        'OUTPUT' => [
        ]
    ]
];