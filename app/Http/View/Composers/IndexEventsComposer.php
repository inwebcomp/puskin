<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use Illuminate\View\View;

class IndexEventsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $events = Article::events()
            ->published()
            ->latest()
            ->withTranslation()
            ->with('images')
            ->take(3)
            ->get();

        $view->with('events', $events);
    }
}