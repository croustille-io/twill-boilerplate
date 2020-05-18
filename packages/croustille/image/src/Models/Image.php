<?php

namespace Croustille\Image\Models;

use Croustille\Image\Models\ImageSourceInterface;

class Image
{
    protected $source;
    protected $paddingBottom;
    protected $backgroundColor;
    protected $lqip;
    protected $sizes;

    public function __construct(ImageSourceInterface $source, array $args = [])
    {
        $this->source = $source;

        $this->paddingBottom = $this->ratio();

        $this->backgroundColor
            = $args['backgroundColor'] ??
            config('images.background_color') ??
            '#e3e3e3';

        $this->lqip
            = $args['lqip'] ??
            config('images.lqip') ??
            false;

        $this->sizes = $args['sizes'] ?? null;
    }

    public function ratio()
    {
        return number_format((float) (100 / ($this->source->width() / $this->source->height())), 2, '.', '');
    }

    public function view()
    {
        return view(
            'image::image',
            [
                'paddingBottom' => $this->paddingBottom,
                'alt' => $this->source->alt(),
                'backgroundColor' => $this->backgroundColor,
                'srcSets' => $this->source->srcSets(),
                'src' => $this->source->defaultSrc(),
                'sizes' => $this->sizes ?? $this->source->sizesAttr(),
                'lqip' => $this->lqip ? $this->source->lqip() : false,
                'dataAttr' => $this->source->dataAttr(),
                'pixel' => 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
                'lazyload' => request('lazyload') !== "0",
            ]
        );
    }
}
