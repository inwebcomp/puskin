<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Metadata;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::withTranslation()
                           ->with('images')
                           ->published()
                           ->ordered()
                           ->get()->chunk(2);

        return view('pages.teachers', [
            'pageType'    => 'teachers',
            'breadcrumbs' => Breadcrumbs::teachers(),
            'teachers'    => $teachers,
            'meta'        => Metadata::fromPage('teacher'),
        ]);
    }

    public function show($teacher)
    {
        $teacher = Teacher::findBySlug($teacher)->published()->firstOrFail();

        return view('pages.teacher', [
            'pageType'    => 'teacher',
            'breadcrumbs' => Breadcrumbs::teachers($teacher),
            'teacher'     => $teacher,
            'meta'        => Metadata::fromModel($teacher),
        ]);
    }
}
