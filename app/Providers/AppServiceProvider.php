<?php

namespace App\Providers;

use App\Models\Textblock;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('contacts', function () {
            $textblocks = Textblock::withTranslation()->published()->get();

            $data = [];

            foreach ($textblocks as $textblock)
                $data[$textblock->uid] = $textblock->getHtml(true);

            if (isset($data['phone']))
                $data['phone_link'] = preg_replace('/[^\d+]+/', '', strip_tags($data['phone']));

            return $data;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
