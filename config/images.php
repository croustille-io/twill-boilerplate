<?php

return [

    'lqip' => true,

    'profiles' => [
        'generic_image' => [
            'default_width' => 989,
            // 'sizes' => '100vw', // default to 100vw
            'sources' => [
                [
                    'widths' => [989, 1299, 1519, 1919, 2599, 3038],
                ]
            ]
        ],
    ],

    'roles' => [
        'site_preview_image' => 'generic_image',
        'preview_image' => 'generic_image',
    ],

];
