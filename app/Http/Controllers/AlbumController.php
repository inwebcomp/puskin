<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Album;
use App\Models\Article;
use App\Models\Metadata;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use InWeb\Media\Image;

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
            'breadcrumbs' => Breadcrumbs::album(),
            'albums'      => $albums,
            'meta'        => Metadata::fromPage('album'),
        ]);
    }

    public function show($album)
    {
        $album = Album::findBySlug($album)->published()->firstOrFail();

        return view('pages.album-gallery', [
            'album'       => $album,
            'pageType'    => 'album',
            'images'      => $album->images,
            'breadcrumbs' => Breadcrumbs::album($album),
        ]);
    }
}
