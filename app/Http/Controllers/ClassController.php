<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Album;
use App\Models\Article;
use App\Models\ClassModel;
use App\Models\Metadata;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use InWeb\Media\Image;

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
            'classes'      => $classes,
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
        ]);
    }
}
