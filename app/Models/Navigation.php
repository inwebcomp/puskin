<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\Nested;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\WithStatus;
use InWeb\Base\Traits\WithUID;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Navigation
 * @package App\Models
 * @property string title
 * @property string|null link
 */
class Navigation extends Entity implements Nested, Sortable, Cacheable
{
    use Translatable,
        WithUID,
        WithStatus,
        Positionable,
        NodeTrait;

    public $translationModel = 'App\Translations\NavigationTranslation';
    public $translatedAttributes = ['title', 'link'];

    public function getTable()
    {
        return 'navigation';
    }

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
//        \Cache::tags('navigation')->flush();
    }

    public static function cacheTagAll()
    {
        return 'navigation';
    }

    public function cacheTag()
    {
        return 'navigation:' . $this->getKey();
    }

    public function getLinkAttribute($value)
    {
        if ($this->page)
            return $this->page->path();

        if ($this->article)
            return $this->article->path();

        return ($value ? Route::localized($value) : '/');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
