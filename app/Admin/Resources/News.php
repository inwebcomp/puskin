<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use Admin\ResourceTools\Comments\Comments;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use App\Admin\Actions\SetDailyArticle;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Select;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class News extends Resource
{
    public static $model = \App\Models\Article::class;
    protected static $position = 4;

    public static $with = ['translations', 'category'];

    public static $globallySearchable = true;

    public static $search = [
        'title'
    ];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Новости');
    }

    public static function singularLabel()
    {
        return __('Новость');
    }

    public static function uriKey()
    {
        return 'news';
    }

    public static function indexQuery(AdminRequest $request, $query)
    {
        return $query->news();
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function fields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath()),
            Text::make(__('URL ID'), 'slug'),
            Select::make(__('Рубрика'), function() {
                return optional($this->category)->title;
            }),
            Textarea::make(__('Описание'), 'description')->displayUsing(function($value) {
                return Str::limit(strip_tags($value), 600);
            }),
            Boolean::make(__('Запись дня'), 'daily'),
            Boolean::make(__('Опубликован'), 'status'),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function detailFields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath()),
            Select::make(__('Тип'), 'type')->options(Select::prepare(Article::types()))->default(Article::NEWS),
            Text::make(__('URL ID'), 'slug'),
            Select::make(__('Рубрика'), 'category_id')
                  ->options(Select::prepare(
                      Category::query()->news()->withTranslation()->get()->pluck('title', 'id'))
                  )->withEmpty(),
            Textarea::make(__('Описание'), 'description')->original(),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликован'), 'status'),

            new Images(),
            new Metadata(),
            new Comments(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
            new SetDailyArticle(),
        ];
    }
}
