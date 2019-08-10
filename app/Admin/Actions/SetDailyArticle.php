<?php


namespace App\Admin\Actions;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use InWeb\Admin\App\Actions\Action;
use InWeb\Admin\App\Fields\ActionFields;

class SetDailyArticle extends Action
{
    use SerializesModels;

    public $withoutActionEvents = true;
    public $availableForEntireResource = false;
    public $onlyOnDetail = true;

    public function icon()
    {
        return 'far fa-thumbtack';
    }

    public function name()
    {
        return __('Сделать записью дня');
    }

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        if ($model = $models->first()) {
            Article::daily()->update(['daily' => 0]);
            $model->update(['daily' => 1]);
        }

        return Action::message(__("Запись дня установлена"));
    }
}