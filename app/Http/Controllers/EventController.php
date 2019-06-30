<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'pageType' => 'index'
        ]);
    }

    public function show($article)
    {
        $article = Article::events()->findBySlug($article)->firstOrFail();

        return view('pages.page', [
            'page'     => $article,
            'pageType' => 'article',
            'breadcrumbs' => Breadcrumbs::article($article),
        ]);
    }
}
