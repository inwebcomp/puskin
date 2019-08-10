<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use Illuminate\View\View;

class DailyNewsComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $item = Article::daily()
                       ->published()
                       ->latest()
                       ->first();

        if (! $item) {
            $item = Article::published()
                           ->latest()
                           ->first();
        }

        $view->with('item', $item);
    }
}