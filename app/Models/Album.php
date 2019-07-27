<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Carbon\Carbon;
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
class Album extends Entity implements HasPage, Sortable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithImages;

    public $translationModel     = 'App\Translations\AlbumTranslation';
    public $translatedAttributes = ['title', 'slug', 'text'];

    public function path()
    {
        return route('album.show', $this->slug);
    }

    public static function pathAll()
    {
        return route('album.index', null);
    }

    public function getImageThumbnails()
    {
        return [
            'preview'  => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(338, 210, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }),
            'original' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->resize(1200, 1200, function (Constraint $constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                });
            }),
        ];
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
}
