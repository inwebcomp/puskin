<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use Illuminate\View\View;

class IndexNewsComposer
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
            ->latest()
            ->withTranslation()
            ->with('images')
            ->take(4)
            ->get();

        $view->with('news', $news);
    }
}