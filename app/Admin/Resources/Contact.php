<?php

namespace App\Admin\Resources;

use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Contact extends Resource
{
    public static $model = \App\Models\Contact::class;
    protected static $position = 9;

    public static $with = ['translations'];

    public static $globallySearchable = true;

    public static $search = [
        'title', 'name'
    ];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Контакты');
    }

    public static function singularLabel()
    {
        return __('Контакт');
    }

    public static function uriKey()
    {
        return 'contact';
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
            Text::make(__('Заголовок'), 'title')->link($this->editPath()),
            Text::make(__('Имя'), 'name'),
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
            Text::make(__('Заголовок'), 'title')->link($this->editPath()),
            Text::make(__('Имя'), 'name'),
            Text::make(__('Телефон'), 'phone'),
            Text::make(__('Моб. телефон'), 'phone_mobile'),
            Text::make(__('Email'), 'email'),
            Boolean::make(__('Опубликован'), 'status')->default(true),
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
