<?php

namespace App\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ClassModelTranslation extends Model
{
    public $timestamps = false;

    use Sluggable;

    public function getTable()
    {
        return 'class_translations';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'slug', 'text'];
}
