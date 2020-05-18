<?php

return [

    'settings' => [
        'title' => 'Global',
        'route' => 'admin.settings',
        'params' => ['section' => 'global'],
        'primary_navigation' => [
            'global' => [
                'title' => 'Global',
                'route' => 'admin.settings',
                'params' => ['section' => 'global']
            ],
            'seo' => [
                'title' => 'SEO',
                'route' => 'admin.settings',
                'params' => ['section' => 'seo']
            ],
        ]
    ],

];
