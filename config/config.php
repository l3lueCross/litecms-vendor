<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'vendor',

    /*
     * Modules.
     */
    'modules'   => ['vendor'],

    
    'vendor'       => [
        'model' => [
            'model'                 => \Litecms\Vendor\Models\Vendor::class,
            'table'                 => 'vendors',
            'presenter'             => \Litecms\Vendor\Repositories\Presenter\VendorPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['name'],
            'translatables'         => [],
            'upload_folder'         => 'vendor/vendor',
            'uploads'               => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts'                 => [
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Vendor',
            'module'    => 'Vendor',
        ],

    ],
];
