<?php

namespace App\Models;

use App\Translations\TextblockTranslation;
use Dimsav\Translatable\Translatable;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\WithStatus;
use InWeb\Base\Traits\WithUID;
use Spatie\EloquentSortable\Sortable;

class Textblock extends Entity implements Cacheable, Sortable
{
    use Translatable,
        WithUID,
        WithStatus,
        Positionable;

    public $translationModel = TextblockTranslation::class;
    public $translatedAttributes = ['title', 'text'];

    protected $fillable = [
        'uid',
        'title',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            static::clearCache();
        });
        static::deleted(function () {
            static::clearCache();
        });
        static::created(function () {
            static::clearCache();
        });
    }

    public static function clearCache(Cacheable $model = null)
    {
//        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'textblocks';
    }

    public function cacheTag()
    {
        return 'textblock:' . $this->getKey();
    }

    public static function text($name)
    {
        return strip_tags(static::html($name));
    }

    public static function html($name)
    {
        return optional(static::findByUID($name))->text;
    }
}