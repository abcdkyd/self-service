<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/11/6
 * Time: 下午2:17
 */

$debug = true;

if ($debug) {
    return [
        'ZYB' => [
            'carLoans' => [
                'server-url' => '',
                'AES-KEY' => '',
                'ssl-cert' => app_path(''),
                'ssl-key' => app_path(''),
                'cert-pass' => '',
                'verify-cert' => app_path(''),
            ]
        ]
    ];
} else {
    return [
        'ZYB' => [
            'carLoans' => [
                'server-url' => '',
                'AES-KEY' => '',
                'ssl-cert' => app_path(''),
                'ssl-key' => app_path(''),
                'cert-pass' => '',
                'verify-cert' => app_path(''),
            ]
        ]
    ];
}