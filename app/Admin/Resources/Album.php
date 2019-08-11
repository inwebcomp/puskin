<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Date;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Select;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Album extends Resource
{
    public static $model = \App\Models\Album::class;
    protected static $position = 6;

    public static $with = ['translations'];

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
        return __('Фотоальбомы');
    }

    public static function singularLabel()
    {
        return __('Фотоальбом');
    }

    public static function uriKey()
    {
        return 'album';
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
            Date::make(__('Дата'), 'date')->displayUsing(function() {
                return $this->dateFormatted;
            }),
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
            Text::make(__('URL ID'), 'slug'),
            Date::make(__('Дата'), 'date'),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликован'), 'status')->default(true),

            new Images(),
            new Metadata(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
        ];
    }
}
