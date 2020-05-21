<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Page extends Model implements LocalizedUrlRoutable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
        'content',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'preview_image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 0,
                ],
            ],
        ],
    ];

    private function getJsonFieldValue($field, $fieldGroup = 'content')
    {
        $jsonFields = json_decode($this->$fieldGroup, true);

        return $jsonFields[$field] ?? null;
    }

    public function getTranslatedJsonFieldValue($field, $fieldGroup = 'content', $forceLocale = null)
    {
        $jsonFields = (object) json_decode($this->$fieldGroup, true);

        $value = $jsonFields->$field ?? null;

        $locale = $forceLocale ?? (
            config('translatable.use_property_fallback', false) && (!array_key_exists(app()->getLocale(), $value ?? []))
            ? config('translatable.fallback_locale')
            : app()->getLocale()
        );

        return $value[$locale] ?? null;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }
}
