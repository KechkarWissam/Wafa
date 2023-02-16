<?php
return [
    'show_in_dash_sections' => [
        [
            'name' => 'Section to the left',
            'id' => 'section_left'
        ],
        [
            'name' => 'Section to the right',
            'id' => 'section_right'
        ],
        [
            'name' => 'Section in center',
            'id' => 'section_center'
        ],
    ],
    'media' => [
        // 'product' => [
        //     'builder' => \App\Models\Product::class
        // ],
        // 'setting' => [
        //     'builder' => \App\Models\Setting::class
        // ],
        // 'category' => [
        //     'builder' => \App\Models\ProductCategory::class
        // ],
    ],
    'permissions' => [
        'all' => [
            'view dashboard',
        ],
        'admin' => array_merge(
            [
                'view settings',
                'view roles',
                'edit role',
                'show role',
                'delete role',
                'add setting',
                'edit setting',
                'show setting',
                'delete setting',
                'view permissions',
                'show user',
                'edit user',
                'delete user',
                'view users',
                'add role',
                'add user',
                'add product',
                'edit product',
                'delete product',
                'view products',
                'show product',
                'add product category',
                'edit product category',
                'delete product category',
                'view product categories',
                'show product category',
                'view messages',
                'delete message',
                'view reviews',
                'add review',
                'replay review',
                'delete review',
                'edit review',
                'edit replay',
                'delete replay',
                'view replays',

            ],
            // mediaPermissions(\App\Models\Product::class, 'product'),
            // mediaPermissions(\App\Models\Setting::class, 'setting'),
            // mediaPermissions(\App\Models\ProductCategory::class, 'category'),
            // mediaPermissions(\App\Models\Blog::class, 'blog')
        ),
        'publisher' => array_merge([
            'add product',
            'edit product',
            'delete product',
            'view products',
            'show product',
            'add product category',
            'edit product category',
            'delete product category',
            'view product categories',
            'show product category',
        ],
            // mediaPermissions(\App\Models\Product::class, 'product'),
            // mediaPermissions(\App\Models\ProductCategory::class, 'category')
        )
    ],
    'roles' => [
        'admin' => [
            // give this roles to this emails
            'admin@demo.com'
        ],
        'publisher' => [
            'publisher@demo.com'
        ]
    ],
    // Password = password
    'users' => [
        [
            'name' => 'admin admin',
            'email' => 'admin@demo.com',
            'is_admin' => true,
            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
        ],
        [
            'name' => 'publisher',
            'email' => 'publisher@demo.com',
            'is_admin' => true,
            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
        ]
    ]
];
