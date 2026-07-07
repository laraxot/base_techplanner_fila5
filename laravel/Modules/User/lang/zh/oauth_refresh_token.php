<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth刷新令牌',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-arrow-path',
        'sort' => 34,
    ],
    'label' => 'OAuth刷新令牌',
    'plural_label' => 'OAuth刷新令牌',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'access_token_id' => [
            'label' => '访问令牌',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => '已撤销',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => '过期时间',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'access_token_id' => [
            'label' => '访问令牌',
        ],
        'revoked' => [
            'label' => '已撤销',
        ],
        'expires_at' => [
            'label' => '过期时间',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => '撤销',
        ],
    ],
];
