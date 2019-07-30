<?php

namespace Admin\ResourceTools\Schedule;

use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\Schedule;
use InWeb\Admin\App\Http\Controllers\Controller;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Http\Requests\ResourceDetailRequest;

class ScheduleController extends Controller
{
    /**
     * @param ResourceDetailRequest $request
     * @return array
     */
    public function forClass(ResourceDetailRequest $request)
    {
        /** @var ClassModel $model */
        $model = $request->findModelOrFail();

        $data = [];

        for ($day = 1; $day <= 5; $day++) {
            $subjects = [];

            for ($n = 1; $n <= 7; $n++) {
                $schedule = Schedule::onSubject($day, $model->id, $n)->first();

                $subjects[] = [
                    'day'                 => $day,
                    'class_model_id'      => $model->id,
                    'subject_number'      => $n,
                    'teacher_id'          => optional($schedule)->teacher_id,
                    'subject'             => optional($schedule)->subject,
                    'original'            => optional($schedule)->subject,
                ];
            }

            $data[] = [
                'dayName'  => Schedule::dayName($day),
                'subjects' => $subjects
            ];
        }

        return [
            'schedule' => $data,
            'teachers' => Teacher::ordered()->get()->map(function (Teacher $teacher) {
                return [
                    'title' => $teacher->name,
                    'value' => $teacher->id,
                ];
            })->prepend([
                'title' => '-- ' . __('Выберите учителя'),
                'value' => null,
            ]),
        ];
    }

    public function search(AdminRequest $request)
    {
        $query = $request->input('query');

        return [
            'values' => Schedule::where('subject', 'LIKE', $query . '%')
                                ->where('subject', '!=', '')
                                ->where('subject', '!=', $query)
                                ->distinct('subject')
                                ->orderByRaw('subject')
                                ->pluck('subject')
                                ->map(function ($value) {
                                    return [
                                        'title' => $value,
                                        'value' => $value
                                    ];
                                })
        ];
    }

    public function update(AdminRequest $request)
    {
        /** @var ClassModel $model */
        $model = $request->findModelOrFail();

        $schedule = Schedule::onSubject(
            $request->input('day'),
            $model->id,
            $request->input('subject_number')
        )->first();

        if ($schedule) {
            $schedule->subject = $request->input('subject');
            $schedule->teacher_id = $request->input('teacher_id');

            $schedule->save();

            return [];
        }

        Schedule::create([
            'day'            => $request->input('day'),
            'subject_number' => $request->input('subject_number'),
            'class_model_id' => $model->id,
            'subject'        => $request->input('subject'),
            'teacher_id'     => $request->input('teacher_id'),
        ]);

        return [];
    }
}
