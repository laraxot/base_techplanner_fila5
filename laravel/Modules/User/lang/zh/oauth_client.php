<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth客户端',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-key',
        'sort' => 46,
    ],
    'label' => 'OAuth客户端',
    'plural_label' => 'OAuth客户端',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => '用户',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => '名称',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'secret' => [
            'label' => '密钥',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'provider' => [
            'label' => '提供商',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'redirect' => [
            'label' => '重定向',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'personal_access_client' => [
            'label' => '个人访问客户端',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_client' => [
            'label' => '密码客户端',
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
        'created_at' => [
            'label' => '创建时间',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => '更新时间',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'user_id' => [
            'label' => '用户',
        ],
        'name' => [
            'label' => '名称',
        ],
        'secret' => [
            'label' => '密钥',
        ],
        'provider' => [
            'label' => '提供商',
        ],
        'redirect' => [
            'label' => '重定向',
        ],
        'personal_access_client' => [
            'label' => '个人访问客户端',
        ],
        'password_client' => [
            'label' => '密码客户端',
        ],
        'revoked' => [
            'label' => '已撤销',
        ],
        'created_at' => [
            'label' => '创建时间',
        ],
        'updated_at' => [
            'label' => '更新时间',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'create_client' => [
            'label' => '创建客户端',
        ],
        'revoke' => [
            'label' => '撤销',
        ],
    ],
];
