<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\ClassModel;
use App\Models\Metadata;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $classes = ClassModel::withTranslation()
                             ->published()
                             ->ordered()
                             ->get()->chunk(2);

        return view('pages.classes', [
            'pageType'    => 'classes',
            'breadcrumbs' => Breadcrumbs::classes(),
            'classes'     => $classes,
            'meta'        => Metadata::fromPage('class'),
        ]);
    }

    public function show($class)
    {
        $class = ClassModel::findBySlug($class)->published()->firstOrFail();

        return view('pages.class', [
            'pageType'    => 'class',
            'breadcrumbs' => Breadcrumbs::classes($class),
            'class'       => $class,
            'meta'        => Metadata::fromModel($class),
        ]);
    }
}
