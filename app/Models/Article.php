<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Intervention\Image\Constraint;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Thumbnail;
use InWeb\Media\WithContentImages;
use InWeb\Media\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 */
class Article extends Entity implements HasPage, Sortable, Cacheable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages;
    const NEWS = 0;
    const EVENT = 1;
    public $translationModel = 'App\Translations\ArticleTranslation';
    public $translatedAttributes = ['title', 'slug', 'description', 'text'];

    public function path()
    {
        $type = $this->type == static::NEWS ? 'news' : 'event';

        return Route::localized(route($type . '.show', $this->slug, false));
    }

    public function getImageThumbnails()
    {
        return [
            'big'  => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(320, 196, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }, true),
            'card' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(257, 160, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }, true),
        ];
    }

    public static function clearCache(Cacheable $model = null)
    {
        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'articles';
    }

    public function cacheTag()
    {
        return 'article:' . $this->id;
    }

    public static function defaultType()
    {
        return static::NEWS;
    }

    public static function types()
    {
        return [
            static::NEWS  => __('Новость'),
            static::EVENT => __('Мероприятие'),
        ];
    }

    public function scopeNews(Builder $query)
    {
        return $query->where('type', static::NEWS);
    }

    public function scopeEvents(Builder $query)
    {
        return $query->where('type', static::EVENT);
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }
}
