<?php

namespace App\Models\Traits;

/**
 * Undocumented trait
 */
trait JsonField
{
    protected $jsonFieldGroupKey = 'content';

    private function getJsonFieldValue($field, $fieldGroup = null)
    {
        $fieldKey = $fieldGroup ?? $this->jsonFieldGroupKey;
        $jsonFields = json_decode($this->$fieldKey, true);

        return $jsonFields[$field] ?? null;
    }

    private function getTranslatedJsonFieldValue($field, $fieldGroup = null, $forceLocale = null)
    {
        $fieldKey = $fieldGroup ?? $this->jsonFieldGroupKey;
        $jsonFields = (object) json_decode($this->$fieldKey, true);

        $value = $jsonFields->$field ?? null;

        $locale = $forceLocale ?? (
            config('translatable.use_property_fallback', false) && (!array_key_exists(app()->getLocale(), $value ?? []))
            ? config('translatable.fallback_locale')
            : app()->getLocale()
        );

        return $value[$locale] ?? null;
    }
}
