<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use Intervention\Image\Image;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Thumbnail;
use InWeb\Media\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Banner
 *
 * @package App
 * @property string title
 * @property string link
 */
class Banner extends Entity implements Sortable
{
    use Translatable,
        WithStatus,
        Positionable,
        WithImages;

    public $translationModel     = 'App\Translations\BannerTranslation';
    public $translatedAttributes = ['title', 'link'];

    public function getImageThumbnails()
    {
        return [
            'catalog' => new Thumbnail(function (Image $image) {
                return $image->fit(770, 405, function (Constraint $constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                });
            }),
        ];
    }
}
