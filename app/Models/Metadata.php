<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use InWeb\Base\Entity;
use InWeb\Base\Traits\BindedToModelAndObject;

/**
 * Class Metadata
 *
 * @package App
 * @property string title
 * @property string description
 */
class Metadata extends Entity
{
    use Translatable,
        BindedToModelAndObject;

    public $translationModel = 'App\Translations\MetadataTranslation';
    public $translatedAttributes = ['title', 'description'];

    public function getTable()
    {
        return 'metadata';
    }

    public function toArray()
    {
        $data = [];

        if ($this->title)
            $data['title'] = $this->title;

        if ($this->description)
            $data['description'] = $this->description;

        return $data;
    }

    public static function fromPage($page)
    {
        if (! ($page instanceof Page))
            $page = Page::findBySlug($page)->first();

        if (! $page)
            return [];

        $result = optional($page->metadata)->toArray() ?? [];

        return array_merge([
            'title' => $page->title,
        ], $result);
    }

    /**
     * @param Entity|WithMetadata $model
     * @return array
     */
    public static function fromModel(Entity $model)
    {
        $result = optional($model->metadata)->toArray() ?? [];

        return array_merge([
            'title' => $model->getMetaTitle(),
        ], $result);
    }
}
