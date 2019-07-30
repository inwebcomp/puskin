<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InWeb\Base\Entity;

class Schedule extends Entity
{
    protected $fillable = [
        'day',
        'subject_number',
        'class_model_id',
        'subject',
        'teacher_id',
    ];

    public static function scopeOnSubject(Builder $query, int $day, int $class, int $subjectNumber)
    {
        return $query->where('day', '=', $day)
                     ->where('class_model_id', '=', $class)
                     ->where('subject_number', '=', $subjectNumber);
    }

    public function getTable()
    {
        return 'schedule';
    }

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public static function dayName($day)
    {
        switch ($day) {
            case 1:
                return __('Понедельник');
            case 2:
                return __('Вторник');
            case 3:
                return __('Среда');
            case 4:
                return __('Четверг');
            case 5:
                return __('Пятница');
            case 6:
                return __('Суббота');
            case 7:
                return __('Воскресенье');
        }

        return null;
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public static function lessonTime($lessonNumber)
    {
        $start = Carbon::make('8:00');

        $defaultBreak = 10;

        $break = $defaultBreak * ($lessonNumber - 1);

        if ($lessonNumber >= 4)
            $break += 10;

        $start->addMinutes(45 * ($lessonNumber - 1) + $break);

        return [
            'start' => $start->format('H:i'),
            'end' => $start->addMinutes(45)->format('H:i'),
        ];
    }
}
