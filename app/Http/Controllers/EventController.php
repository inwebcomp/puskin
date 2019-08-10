<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;
use App\Models\Metadata;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'pageType' => 'index',
            'meta'     => Metadata::fromPage('events'),
        ]);
    }

    public function show(Request $request, $article)
    {
        $article = Article::events()->findBySlug($article)->published()->firstOrFail();

        if ($request->getMethod() == 'POST') {
            $controller = new FormController();
            $data = $controller->callAction('comment', [$request, $article]);
        } else {
            $data = [];
        }

        return view('pages.page', [
            'page'        => $article,
            'pageType'    => 'article',
            'breadcrumbs' => Breadcrumbs::article($article),
        ]);
    }
}
