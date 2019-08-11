<?php

namespace App\Admin\Resources;

use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Textblock extends Resource
{
    protected static $position = 3;
    public static $model = \App\Models\Textblock::class;
    public static $with = ['translations'];

    public static function label()
    {
        return __('Текстовые блоки');
    }

    public static function singularLabel()
    {
        return __('Текстовый блок');
    }

    public static function uriKey()
    {
        return 'textblock';
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
            Text::make(__('Наименование'), 'title')
                ->link($this->editPath())
                ->rules('required')
                ->help(__('Название блока в админ-панели')),

            Text::make(__('Идентификатор'), 'uid')
                ->rules('required')
                ->help(__('Связывает блок с нужным местом на сайте')),

            Editor::make(__('Текст'), 'text')
                ->displayUsing(function ($value) {
                    return Str::limit(strip_tags($value), 600);
                }),

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
