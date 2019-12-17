<?php

return [
    'admin' => [
        [
            'key' => 'welcome',
            'name' => 'Welcome',
            'route' => 'admin.welcome',
            'sort' => 0,
            'icon-class' => 'fa fa-home fa-2x',
        ], [
            'key' => 'news',
            'name' => 'News',
            'route' => 'news.index',
            'sort' => 1,
            'icon-class' => 'fa fa-newspaper-o fa-2x',
        ], [
            'key' => 'galleries',
            'name' => 'Galleries',
            'route' => 'galleries.index',
            'sort' => 1,
            'icon-class' => 'fa fa-picture-o fa-2x',
        ], [
            'key' => 'images',
            'name' => 'Images',
            'route' => 'images.index',
            'sort' => 1,
            'icon-class' => 'fa fa-camera-retro fa-2x',
        ],  [
            'key' => 'offices',
            'name' => 'Official Offices',
            'route' => 'offices.index',
            'sort' => 1,
            'icon-class' => 'fa fa-university fa-2x',
        ], [
            'key' => 'partners',
            'name' => 'Partners',
            'route' => 'partners.index',
            'sort' => 1,
            'icon-class' => 'fa fa-user-plus fa-2x',
        ], [
            'key' => 'certificates',
            'name' => 'Certificates',
            'route' => 'certificates.index',
            'sort' => 98,
            'icon-class' => 'fa fa-certificate fa-2x',
        ],
        [
            'key' => 'contents',
            'name' => 'Contents',
            'route' => 'contents.index',
            'sort' => 99,
            'icon-class' => 'fa fa-pencil-square-o fa-2x',
        ],
        [
            'key' => 'tracking',
            'name' => 'Tracking statistics',
            'route' => 'tracker.stats.index',
            'sort' => 100,
            'icon-class' => 'fa fa-line-chart fa-2x',
        ], 
        [
        'key' => 'customers.sendNewsLetter',
        'name' => 'Send Newsletter',
        'route' => 'sendNewsLetter.index',
        'sort' => 14,
        'icon-class' => '',
        ],
    ],

    'customer' => [

    ]
];

?>