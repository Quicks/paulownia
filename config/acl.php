<?php

return [
    [
        'key' => 'welcome',
        'name' => 'Welcome',
        'route' => 'admin.welcome',
        'sort' => 1
    ],

    [
        'key' => 'news',
        'name' => 'News',
        'route' => 'news.index',
        'sort' => 1
    ],
    [
        'key' => 'news.add',
        'name' => 'Add',
        'route' => 'news.store',
        'sort' => 1
    ], [
        'key' => 'news.update',
        'name' => 'Edit any news (not just own)',
        'route' => 'news.update',
        'sort' => 2
    ], [
        'key' => 'news.destroy',
        'name' => 'Delete any news (not just own)',
        'route' => 'news.destroy',
        'sort' => 3
    ],

    [
        'key' => 'articles',
        'name' => 'Articles',
        'route' => 'articles.index',
        'sort' => 1
    ],
    [
        'key' => 'articles.add',
        'name' => 'Add',
        'route' => 'articles.store',
        'sort' => 1
    ], [
        'key' => 'articles.update',
        'name' => 'Edit',
        'route' => 'articles.update',
        'sort' => 2
    ], [
        'key' => 'articles.destroy',
        'name' => 'Delete',
        'route' => 'articles.destroy',
        'sort' => 3
    ],

    [
        'key' => 'galleries',
        'name' => 'Galleries',
        'route' => 'galleries.index',
        'sort' => 1
    ],
    [
        'key' => 'galleries.add',
        'name' => 'Add',
        'route' => 'galleries.store',
        'sort' => 1
    ], [
        'key' => 'galleries.update',
        'name' => 'Edit',
        'route' => 'galleries.update',
        'sort' => 2
    ], [
        'key' => 'galleries.destroy',
        'name' => 'Delete',
        'route' => 'galleries.destroy',
        'sort' => 3
    ],

    [
        'key' => 'images',
        'name' => 'Images',
        'route' => 'images.index',
        'sort' => 1
    ],

    [
        'key' => 'treatises',
        'name' => 'Treatises',
        'route' => 'treatises.index',
        'sort' => 1
    ],
    [
        'key' => 'treatises.add',
        'name' => 'Add',
        'route' => 'treatises.store',
        'sort' => 1
    ], [
        'key' => 'treatises.update',
        'name' => 'Edit',
        'route' => 'treatises.update',
        'sort' => 2
    ], [
        'key' => 'treatises.destroy',
        'name' => 'Delete',
        'route' => 'treatises.destroy',
        'sort' => 3
    ],

    [
        'key' => 'offices',
        'name' => 'Offices',
        'route' => 'offices.index',
        'sort' => 1
    ],
    [
        'key' => 'offices.add',
        'name' => 'Add',
        'route' => 'offices.store',
        'sort' => 1
    ], [
        'key' => 'offices.update',
        'name' => 'Edit',
        'route' => 'offices.update',
        'sort' => 2
    ], [
        'key' => 'offices.destroy',
        'name' => 'Delete',
        'route' => 'offices.destroy',
        'sort' => 3
    ],

    [
        'key' => 'partners',
        'name' => 'Partners',
        'route' => 'partners.index',
        'sort' => 1
    ],
    [
        'key' => 'partners.add',
        'name' => 'Add',
        'route' => 'partners.store',
        'sort' => 1
    ], [
        'key' => 'partners.update',
        'name' => 'Edit',
        'route' => 'partners.update',
        'sort' => 2
    ], [
        'key' => 'partners.destroy',
        'name' => 'Delete',
        'route' => 'partners.destroy',
        'sort' => 3
    ],

        [
        'key' => 'certificates',
        'name' => 'Certificates',
        'route' => 'certificates.index',
        'sort' => 1
    ], [
        'key' => 'certificates.add',
        'name' => 'Add Request for certificate',
        'route' => 'certificates.store',
        'sort' => 1
    ], [
        'key' => 'certificates.update',
        'name' => 'Edit request and create certificate',
        'route' => 'certificates.update',
        'sort' => 2
    ], [
        'key' => 'certificates.destroy',
        'name' => 'Delete certificate',
        'route' => 'certificates.destroy',
        'sort' => 3
    ],

    [
        'key' => 'tracking',
        'name' => 'Tracking statistic',
        'route' => 'tracker.stats.index',
        'sort' => 1
    ],
];

?>
