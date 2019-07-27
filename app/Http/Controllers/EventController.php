<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;
use App\Models\Metadata;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'pageType' => 'index',
            'meta'     => Metadata::fromPage('events'),
        ]);
    }

    public function show($article)
    {
        $article = Article::events()->findBySlug($article)->published()->firstOrFail();

        return view('pages.page', [
            'page'        => $article,
            'pageType'    => 'article',
            'breadcrumbs' => Breadcrumbs::article($article),
        ]);
    }
}
