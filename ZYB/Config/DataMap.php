<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/10/31
 * Time: 下午3:15
 */

return [
    'CERTTYPE' => [
        'Ind01' => [
            'value' => 'Ind01',
            'label' => '身份证',
        ],
        'Ind02-' => [
            'value' => 'Ind02',
            'label' => '户口簿',
        ],
        'Ind03' => [
            'value' => 'Ind03',
            'label' => '护照',
        ],
        'Ind04' => [
            'value' => 'Ind04',
            'label' => '军官证',
        ],
        'Ind05' => [
            'value' => 'Ind05',
            'label' => '士兵证',
        ],
        'Ind06' => [
            'value' => 'Ind06',
            'label' => '港澳居民来往内地通行证',
        ],
        'Ind07' => [
            'value' => 'Ind07',
            'label' => '台湾同胞来往内地通行证',
        ],
        'Ind08' => [
            'value' => 'Ind08',
            'label' => '临时身份证',
        ],
        'Ind09' => [
            'value' => 'Ind09',
            'label' => '外国人居留证',
        ],
        'Ind10' => [
            'value' => 'Ind10',
            'label' => '警官证',
        ],
        'Ind11' => [
            'value' => 'Ind11',
            'label' => '其他个人证件',
        ],
        'Ind12' => [
            'value' => 'Ind12',
            'label' => '香港身份证',
        ],
        'Ind13' => [
            'value' => 'Ind13',
            'label' => '澳门身份证',
        ],
        'Ind14' => [
            'value' => 'Ind14',
            'label' => '台湾身份证',
        ],
    ],
    'ERRORCODE' => [
        'UOS0000' => [
            'value' => 'UOS0000',
            'label' => '请求成功',
            'description' => '请求成功',
        ],
        'UOS0001' => [
            'value' => 'UOS0001',
            'label' => '交易超时',
            'description' => '超时，区分第三方超时和行内超时',
        ],
        'UOS0003' => [
            'value' => 'UOS0003',
            'label' => '数据项缺失',
            'description' => '',
        ],
        'UOS0004' => [
            'value' => 'UOS0004',
            'label' => '文件读写失败',
            'description' => '',
        ],
        'UOS0006' => [
            'value' => 'UOS0006',
            'label' => '连接失败',
            'description' => '连接失败，区分第三方通讯失败和行内通讯失败,很明确是未建立连接，交易肯定不成功',
        ],
        'UOS0007' => [
            'value' => 'UOS0007',
            'label' => '返回报文验签失败',
            'description' => '',
        ],
        'UOS0009' => [
            'value' => 'UOS0009',
            'label' => '其他错误',
            'description' => '',
        ],
        'UOS0010' => [
            'value' => 'UOS0010',
            'label' => '返回报文格式有误',
            'description' => '',
        ],
        'UOS0012' => [
            'value' => 'UOS0012',
            'label' => '系统服务调用异常',
            'description' => '',
        ],
        'UOS0013' => [
            'value' => 'UOS0013',
            'label' => '交易失败',
            'description' => '第三方返回失败',
        ],
        'UOS0014' => [
            'value' => 'UOS0014',
            'label' => '连接关闭',
            'description' => '读数据时，连接已关闭，这种情况也不能判断对方是否接收到数据',
        ],
        'UOS0015' => [
            'value' => 'UOS0015',
            'label' => '连接重置',
            'description' => '发送数据时，连接被reset，这种情况网络问题导致，数据一般是没有发送到服务方（大于90%）',
        ],
        'UOS0016' => [
            'value' => 'UOS0016',
            'label' => '接收异常',
            'description' => '接收异常，通常是服务方数据未返回连接关闭导致，这种情况下，对方通常是接收到数据请求，但是未应答到请求方',
        ],
        'UOS0017' => [
            'value' => 'UOS0017',
            'label' => '根据对方服务器返回确定',
            'description' => '第三方服务器返回的具体错误',
        ],
    ],
    'RET_STATUS' => [
        'S' => [
            'value' => 'S',
            'label' => '交易成功',
        ],
        'F' => [
            'value' => 'F',
            'label' => '交易失败',
        ],
        'O' => [
            'value' => 'O',
            'label' => '交易授权',
        ],
        'C' => [
            'value' => 'C',
            'label' => '交易确认',
        ],
        'B' => [
            'value' => 'B',
            'label' => '授权+确认',
        ],
    ]
];