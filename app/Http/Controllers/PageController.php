<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'pageType' => 'index'
        ]);
    }

    public function show($page)
    {
        $page = Page::findBySlug($page)->firstOrFail();

        return view('pages.page', [
            'page'     => $page,
            'pageType' => 'article',
            'breadcrumbs' => Breadcrumbs::page($page),
        ]);
    }
}
