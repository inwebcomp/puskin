<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * @package App
 * @property string title
 * @property string slug
 */
class ClassModel extends Entity implements HasPage, Sortable
{
    use Translatable,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata;

    public $translationModel = 'App\Translations\ClassModelTranslation';
    public $translatedAttributes = ['title', 'slug', 'text'];

    public function getTable()
    {
        return 'classes';
    }

    public function path()
    {
        return route('class.show', $this->slug);
    }

    public static function pathAll($params = null)
    {
        return route('class.index', $params);
    }
}
