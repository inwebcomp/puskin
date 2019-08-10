<?php


namespace App\Models;


use InWeb\Base\Entity;
use InWeb\Base\Traits\WithStatus;

/**
 * Class Comment
 * @package App\Models
 * @property string name
 * @property string text
 * @property string date
 */
class Comment extends Entity
{
    use WithStatus;

    protected $fillable = ['name', 'text', 'date'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function getNameAttribute($value)
    {
        return $value ?: __('Аноним');
    }

    public function getDateAttribute()
    {
        return strftime("%e %B %Y, %H:%M", $this->created_at->timestamp);
    }
}