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
use App\Models\Traits\JsonField;

class Project extends Model implements LocalizedUrlRoutable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions;
    use JsonField;

    protected $fillable = [
        'published',
        'title',
        'description',
        'content'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [];

    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }
}
