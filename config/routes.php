<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::extensions(['json', 'xml']);
Router::defaultRouteClass('InflectedRoute');

//Public routes.
Router::scope('/', function ($routes) {

    $routes->connect(
        '/:lang/pages/lang',
        [
            'controller' => 'pages',
            'action' => 'lang'
        ],
        [
            '_name' => 'set-lang',
            'pass' => [
                'lang'
            ]
        ]
    );

    $routes->connect(
        '/',
        [
            'controller' => 'pages',
            'action' => 'home'
        ]
    );

    //Blog Routes.
    $routes->connect(
        '/blog/article/:slug.:id',
        [
            'controller' => 'blog',
            'action' => 'article'
        ],
        [
            '_name' => 'blog-article',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/blog/category/:slug.:id',
        [
            'controller' => 'blog',
            'action' => 'category',
        ],
        [
            '_name' => 'blog-category',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/blog/archive/:slug',
        [
            'controller' => 'blog',
            'action' => 'archive',
        ],
        [
            '_name' => 'blog-archive',
            'pass' => [
                'slug'
            ]
        ]
    );

    //Users Routes.
    $routes->connect(
        '/users/profile/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'profile'
        ],
        [
            '_name' => 'users-profile',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/users/resetPassword/:code.:id',
        [
            'controller' => 'users',
            'action' => 'resetPassword'
        ],
        [
            '_name' => 'users-resetpassword',
            'pass' => [
                'id',
                'code'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Attachments Routes.
    $routes->connect(
        '/attachments/download/:type/:id',
        [
            'controller' => 'attachments',
            'action' => 'download',
        ],
        [
            '_name' => 'attachment-download',
            'pass' => [
                'type',
                'id'
            ]
        ]
    );

    //Groups Routes.
    $routes->connect(
        '/groups/view/:slug.:id',
        [
            'controller' => 'groups',
            'action' => 'view'
        ],
        [
            '_name' => 'groups-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Conversations Routes.
    $routes->connect(
        '/conversations/view/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'view'
        ],
        [
            '_name' => 'conversations-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/messageDelete/:id',
        [
            'controller' => 'conversations',
            'action' => 'messageDelete'
        ],
        [
            '_name' => 'conversations-messageDelete',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/messageEdit/:id',
        [
            'controller' => 'conversations',
            'action' => 'messageEdit'
        ],
        [
            '_name' => 'conversations-messageEdit',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/quote/:id',
        [
            'controller' => 'conversations',
            'action' => 'quote'
        ],
        [
            '_name' => 'conversations-quote',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/invite/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'invite'
        ],
        [
            '_name' => 'conversations-invite',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/edit/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'edit'
        ],
        [
            '_name' => 'conversations-edit',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/leave/:id',
        [
            'controller' => 'conversations',
            'action' => 'leave'
        ],
        [
            '_name' => 'conversations-leave',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/kick/:id/:user_id',
        [
            'controller' => 'conversations',
            'action' => 'kick'
        ],
        [
            '_name' => 'conversations-kick',
            'pass' => [
                'id',
                'user_id'
            ],
            'id' => '[0-9]+',
            'user_id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/reply/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'reply'
        ],
        [
            '_name' => 'conversations-reply',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->fallbacks();
});

//Chat routes.
Router::prefix('chat', function ($routes) {
    $routes->fallbacks();
});

//Forum routes.
Router::prefix('forum', function ($routes) {

    $routes->connect(
        '/',
        [
            'controller' => 'forum',
            'action' => 'index'
        ]
    );

    $routes->connect(
        '/home',
        [
            'controller' => 'forum',
            'action' => 'home'
        ]
    );

    //Forum Routes.
    $routes->connect(
        '/categories/:slug.:id',
        [
            'controller' => 'forum',
            'action' => 'categories'
        ],
        [
            '_name' => 'forum-categories',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/:slug.:id',
        [
            'controller' => 'forum',
            'action' => 'threads'
        ],
        [
            '_name' => 'forum-threads',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Threads Routes
    $routes->connect(
        '/threads/create/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'create'
        ],
        [
            '_name' => 'threads-create',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/edit/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'edit'
        ],
        [
            '_name' => 'threads-edit',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/reply/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'reply'
        ],
        [
            '_name' => 'threads-reply',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/lock/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'lock'
        ],
        [
            '_name' => 'threads-lock',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/unlock/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'unlock'
        ],
        [
            '_name' => 'threads-unlock',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/follow/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'follow'
        ],
        [
            '_name' => 'threads-follow',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/threads/unfollow/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'unfollow'
        ],
        [
            '_name' => 'threads-unfollow',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Posts Routes.
    $routes->connect(
        '/posts/edit/:id',
        [
            'controller' => 'posts',
            'action' => 'edit'
        ],
        [
            '_name' => 'posts-edit',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/posts/delete/:id',
        [
            'controller' => 'posts',
            'action' => 'delete'
        ],
        [
            '_name' => 'posts-delete',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/posts/quote/:id',
        [
            'controller' => 'posts',
            'action' => 'quote'
        ],
        [
            '_name' => 'posts-quote',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->fallbacks();
});

//Admin routes.
Router::prefix('admin', function ($routes) {
    $routes->connect(
        '/',
        [
            'controller' => 'admin',
            'action' => 'home'
        ]
    );

    //Users Routes.
    $routes->connect(
        '/users/edit/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'edit'
        ],
        [
            '_name' => 'users-edit',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/users/delete/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'delete'
        ],
        [
            '_name' => 'users-delete',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/users/deleteAvatar/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'deleteAvatar'
        ],
        [
            '_name' => 'users-deleteAvatar',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Articles Routes.
    $routes->connect(
        '/articles/edit/:slug',
        [
            'controller' => 'articles',
            'action' => 'edit',
        ],
        [
            '_name' => 'articles-edit',
            'pass' => [
                'slug'
            ]
        ]
    );

    $routes->connect(
        '/articles/delete/:slug',
        [
            'controller' => 'articles',
            'action' => 'delete',
        ],
        [
            '_name' => 'articles-delete',
            'pass' => [
                'slug'
            ]
        ]
    );

    //Categories Routes.
    $routes->connect(
        '/categories/edit/:slug',
        [
            'controller' => 'categories',
            'action' => 'edit',
        ],
        [
            '_name' => 'categories-edit',
            'pass' => [
                'slug'
            ]
        ]
    );

    $routes->connect(
        '/categories/delete/:slug',
        [
            'controller' => 'categories',
            'action' => 'delete',
        ],
        [
            '_name' => 'categories-delete',
            'pass' => [
                'slug'
            ]
        ]
    );

    //Attachments Routes.
    $routes->connect(
        '/attachments/edit/:id',
        [
            'controller' => 'attachments',
            'action' => 'edit',
        ],
        [
            '_name' => 'attachments-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/attachments/delete/:id',
        [
            'controller' => 'attachments',
            'action' => 'delete',
        ],
        [
            '_name' => 'attachments-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Groups Routes.
    $routes->connect(
        '/groups/edit/:id',
        [
            'controller' => 'groups',
            'action' => 'edit',
        ],
        [
            '_name' => 'groups-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/groups/delete/:id',
        [
            'controller' => 'groups',
            'action' => 'delete',
        ],
        [
            '_name' => 'groups-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    /**
     * Premium Routes.
     */
    $routes->prefix('premium', function ($routes) {
        $routes->connect(
            '/',
            [
                'controller' => 'premium',
                'action' => 'home'
            ]
        );

        //Premium/Offers Routes.
        $routes->connect(
            '/offers/edit/:id',
            [
                'controller' => 'offers',
                'action' => 'edit',
            ],
            [
                '_name' => 'offers-edit',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->connect(
            '/offers/delete/:id',
            [
                'controller' => 'offers',
                'action' => 'delete',
            ],
            [
                '_name' => 'offers-delete',
                'pass' => [
                    'id'
                ]
            ]
        );

        //Premium/Discounts Routes.
        $routes->connect(
            '/discounts/edit/:id',
            [
                'controller' => 'discounts',
                'action' => 'edit',
            ],
            [
                '_name' => 'discounts-edit',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->fallbacks();
    });

    /**
     * Forum Routes.
     */
    $routes->prefix('forum', function ($routes) {

        //Forum/Categories Routes.
        $routes->connect(
            '/categories/moveup/:id',
            [
                'controller' => 'categories',
                'action' => 'moveup',
            ],
            [
                '_name' => 'forum-categories-moveup',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->connect(
            '/categories/movedown/:id',
            [
                'controller' => 'categories',
                'action' => 'movedown',
            ],
            [
                '_name' => 'forum-categories-movedown',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->connect(
            '/categories/edit/:id',
            [
                'controller' => 'categories',
                'action' => 'edit',
            ],
            [
                '_name' => 'forum-categories-edit',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->connect(
            '/categories/delete/:id',
            [
                'controller' => 'categories',
                'action' => 'delete',
            ],
            [
                '_name' => 'forum-categories-delete',
                'pass' => [
                    'id'
                ]
            ]
        );

        $routes->fallbacks();
    });

    $routes->fallbacks();
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
    Plugin::routes();
