<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Thumbnail;
use InWeb\Media\WithContentImages;
use InWeb\Media\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * @package App
 * @property string name
 * @property string slug
 * @property string post
 * @property string text
 * @property string contacts
 * @property string subjects
 */
class Teacher extends Entity implements HasPage, Sortable
{
    use Translatable,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages,
        WithContentImages;

    public $translationModel     = 'App\Translations\TeacherTranslation';
    public $translatedAttributes = ['name', 'slug', 'post', 'text', 'contacts', 'subjects'];

    public function getMetaTitle()
    {
        return $this->name;
    }

    public function path()
    {
        return route('teacher.show', $this->slug);
    }

    public static function pathAll($params = null)
    {
        return route('teacher.index', $params);
    }

    public function getImageThumbnails()
    {
        return [
            'small' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(120, 160, function (Constraint $constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                });
            }),
        ];
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getCurrentLessonsAttribute()
    {
        $n = Schedule::lessonNumber(now());

        return $this->schedule()
             ->where('day', 1)
             ->where('subject_number', $n)
             ->get();
    }
}
