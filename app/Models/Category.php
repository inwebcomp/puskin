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
class Category extends Entity implements HasPage, Sortable
{
    use Translatable,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata;

    public $translationModel = 'App\Translations\CategoryTranslation';
    public $translatedAttributes = ['title', 'slug'];

    public function path()
    {
        return route('news.show', $this->slug);
    }

    public static function pathAllNews()
    {
        return route('news.index', null);
    }

    public static function pathAllEvents()
    {
        return route('events.index', null);
    }

    public static function types()
    {
        return [
            Article::NEWS  => __('Новостей'),
            Article::EVENT => __('Мероприятий'),
        ];
    }

    public function news()
    {
        return $this->hasMany(Article::class)->where('type', Article::NEWS);
    }

    public function events()
    {
        return $this->hasMany(Article::class)->where('type', Article::EVENT);
    }

    public function articles()
    {
        return $this->type == Article::NEWS ? $this->news() : $this->events();
    }

    public function scopeNews(Builder $query)
    {
        return $query->where('type', Article::NEWS);
    }

    public function scopeEvents(Builder $query)
    {
        return $query->where('type', Article::EVENT);
    }

    public function getCountAttribute()
    {
        return $this->articles()->published()->count();
    }
}
