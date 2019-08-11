<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Filters\Filters;
use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use Admin\ResourceTools\Params\Params;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Filters\Status;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Banner extends Resource
{
    public static $model = \App\Models\Banner::class;
    protected static $position = 2;

    public static $with = ['translations'];

    public static $search = [
        'title'
    ];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Баннеры');
    }

    public static function singularLabel()
    {
        return __('Баннер');
    }

    public static function uriKey()
    {
        return 'banner';
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
            Text::make(__('Ссылка'), 'link'),
            Boolean::make(__('Опубликован'), 'status'),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function creationFields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath()),
            Text::make(__('Ссылка'), 'link'),
            Boolean::make(__('Опубликован'), 'status')->default(true),
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
            Text::make(__('Ссылка'), 'link'),
            Boolean::make(__('Опубликован'), 'status')->default(true),

            new Images(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
        ];
    }

    public function filters(Request $request)
    {
        return [
            new Status()
        ];
    }
}
