<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Album;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $albums = Album::withTranslation()
            ->with('images')
            ->published()
            ->ordered()
            ->get();

        return view('pages.album', [
            'pageType'    => 'album',
            'breadcrumbs' => [Breadcrumbs::album()],
            'albums'      => $albums,
        ]);
    }

    public function show($article)
    {
        $article = Article::news()->findBySlug($article)->firstOrFail();

        return view('pages.page', [
            'page'        => $article,
            'pageType'    => 'article',
            'breadcrumbs' => Breadcrumbs::article($article),
        ]);
    }
}
