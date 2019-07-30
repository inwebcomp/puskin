<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Teacher extends Resource
{
    public static $model = \App\Models\Teacher::class;
    protected static $position = 7;

    public static $with = ['translations'];

    public static $globallySearchable = true;

    public static $search = [
        'name'
    ];

    public function title()
    {
        return $this->name;
    }

    public static function label()
    {
        return __('Учителя');
    }

    public static function singularLabel()
    {
        return __('Учитель');
    }

    public static function uriKey()
    {
        return 'teacher';
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
            Text::make(__('Имя'), 'name')->link($this->editPath()),
            Text::make(__('Должность'), 'post'),
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
            Text::make(__('Имя'), 'name')->link($this->editPath()),
            Text::make(__('URL ID'), 'slug'),
            Text::make(__('Должность'), 'post'),
            Editor::make(__('Описание'), 'text'),
            Editor::make(__('Область деятельности'), 'subjects'),
            Editor::make(__('Контакты'), 'contacts')->help(__('Видны только администраторам')),
            Boolean::make(__('Опубликован'), 'status'),

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
