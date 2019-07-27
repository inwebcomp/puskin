<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class ClassModel extends Resource
{
    public static $model = \App\Models\ClassModel::class;
    protected static $position = 7;

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
        return __('Классы');
    }

    public static function singularLabel()
    {
        return __('Класс');
    }

    public static function uriKey()
    {
        return 'class';
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
            Editor::make(__('Описание'), 'text'),
            Boolean::make(__('Опубликован'), 'status'),

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
