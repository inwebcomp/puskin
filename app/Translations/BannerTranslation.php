<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'link'];
}
