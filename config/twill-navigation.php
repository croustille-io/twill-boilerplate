<?php

return [

    'projects' => [
        'title' => 'Projects',
        'module' => true
    ],

    'pages' => [
        'title' => 'Pages',
        'module' => true
    ],

    'settings' => [
        'title' => 'Settings',
        'route' => 'admin.settings',
        'params' => ['section' => 'seo'],
        'primary_navigation' => [
            'seo' => [
                'title' => 'SEO',
                'route' => 'admin.settings',
                'params' => ['section' => 'seo']
            ],
        ]
    ],

];
