<?php

return [

    'supportedLocales' => [
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_CA'],
        'fr' => ['name' => 'French', 'script' => 'Latn', 'native' => 'Français', 'regional' => 'fr_CA'],
    ],

    'useAcceptLanguageHeader' => true,

    'hideDefaultLocaleInURL' => true,

    'localesOrder' => [],

    'localesMapping' => [],

    'utf8suffix' => env('LARAVELLOCALIZATION_UTF8SUFFIX', '.UTF-8'),

    'urlsIgnored' => ['/skipped'],

];
