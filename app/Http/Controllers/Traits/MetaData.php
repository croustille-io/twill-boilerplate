<?php

namespace App\Http\Controllers\Traits;

use A17\Twill\Models\Model;
use A17\Twill\Models\Setting;
use A17\Twill\Repositories\SettingRepository;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

trait MetaData
{
    private function setMetaData(Model $item)
    {
        $defaultPreviewImage = Setting::where('key', 'site_preview_image')->first();
        $defaultDescription = app(SettingRepository::class)->byKey('site_description', 'seo');

        $previewImage = $item->hasImage('preview_image') ? $item->image(
            'preview_image',
            'default',
            ['w' => 1200, 'h' => 630]
        ) : (
            $defaultPreviewImage ? $defaultPreviewImage->image(
                'site_preview_image',
                'default',
                ['w' => 1200, 'h' => 630]
            ) : null
        );

        $previewTwitterImage = $item->hasImage('preview_image') ? $item->image(
            'preview_image',
            'default',
            ['w' => 1200, 'h' => 600]
        ) : (
            $defaultPreviewImage ? $defaultPreviewImage->image(
                'site_preview_image',
                'default',
                ['w' => 1200, 'h' => 600]
            ) : null
        );

        SEOMeta::setTitle($item->title);
        SEOMeta::setDescription($item->description ?? $defaultDescription);

        OpenGraph::setDescription($item->description ?? $defaultDescription);
        OpenGraph::setTitle($item->title);
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('image', $previewImage);

        TwitterCard::setTitle($item->title);
        TwitterCard::setDescription($item->description ?? $defaultDescription);
        TwitterCard::setImage($previewTwitterImage);

        JsonLd::setTitle($item->title);
        JsonLd::setDescription($item->description ?? $defaultDescription);
        JsonLd::addImage($previewImage);
    }
}
