<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use Illuminate\View\View;

class OtherNewsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $news = Article::news()
            ->published()
            ->withTranslation()
            ->with('images')
            ->take(4)
            ->inRandomOrder()
            ->get();

        $view->with('news', $news);
    }
}