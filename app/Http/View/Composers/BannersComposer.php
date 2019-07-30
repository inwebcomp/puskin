<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use App\Models\Banner;
use Illuminate\View\View;

class BannersComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $banners = Banner::published()
                      ->ordered()
                      ->with('images')
                      ->withTranslation()
                      ->get();

        $view->with('banners', $banners);
    }
}