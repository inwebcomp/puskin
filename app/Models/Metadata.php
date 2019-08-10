<?php

namespace App\Models;

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
}
