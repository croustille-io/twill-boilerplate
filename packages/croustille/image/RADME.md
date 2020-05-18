# Croustille Image

Fluid-type image module for Twill.

-   `<picture>` with `<source>`
-   Twill's LQIP and background color image placeholder
-   Crops association with media query
-   WebP and JPEG support
-   Lazyload image and video with IntersectionOserver

## Installation

```
composer require croustille/image
```

Publish JavaScript assets for inclusion in frontend bundler.

```bash
php artisan vendor:publish --provider="Croustille\Image\ImageServiceProvider" --tag=js
```

Check for WebP support

```js
import webpIsSupported from "./vendor/croustille/image/webpIsSupported";

const CROUSTILLE = window.CROUSTILLE || {};

const checkWebpSupport = async () => {
    if (await webpIsSupported()) {
        console.log("webp is Supported");
        CROUSTILLE.webp = true;
    } else {
        console.log("webp isn't supported");
        CROUSTILLE.webp = false;
    }
};
checkWebpSupport();
```

Init lazyloading

```js
import Lazyload from "./vendor/image/lazyload";

document.addEventListener("DOMContentLoaded", function () {
    const lazyloading = new Lazyload();
    lazyloading.init();
});
```

## Config

Example with a Twill crop `preview_image` defined here:

```php
    // ...
    'crops' => [
        'preview_image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 10 / 16,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'landscape',
                    'ratio' => 10 / 16,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 16 / 9,
                ],
            ],
        ],
    ],
    // ...
```

In `config/images.php`, defines image profiles and assocates Twill image roles to an image profile.

```php
<?php

return [

    'background_color' => '#e3e3e3',

    'lqip' => true,

    'webp_support' => true,

    'profiles' => [
        'generic_image' => [
            'default_width' => 989,
            'sizes' => '(max-width: 767px) 100vw, 50vw',
            'sources' => [
                [
                    'crop' => 'mobile',
                    'media_query' => '(max-width: 767px)',
                    'widths' => [413, 826, 649, 989, 1299, 1519, 1919],
                ],
                [
                    // 'crop' => 'default',
                    'media_query' => '(min-width: 768px)',
                    'widths' => [989, 1299, 1519, 1919, 2599, 3038],
                ]
            ]
        ],
    ],

    'roles' => [
        'preview_image' => 'generic_image',
    ],

];
```

## Usage

In you Blade templates:

```php
{!! CroustilleImage::image($block, 'site_preview_image') !!}
```

# Video lazyloading

...

## TODO

-   Styles for different placeholder ratios
-   MutationObserver on new image/video
-   fix weird webp detection
