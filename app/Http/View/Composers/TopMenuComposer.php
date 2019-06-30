<?php

namespace App\Http\View\Composers;

use App\Models\Navigation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class TopMenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Navigation::findByUID('top')
            ->children()
            ->published()
            ->ordered()
            ->withTranslation()
            ->with(['children' => function($query) {
                $query->withTranslation()->published()->ordered();
            }])->get();

        $view->with('menu', $menu);
    }
}