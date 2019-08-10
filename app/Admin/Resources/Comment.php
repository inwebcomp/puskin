<?php

namespace App\Admin\Resources;

use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Admin;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Datetime;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;
use InWeb\Admin\App\Section;

class Comment extends Resource
{
    public static    $model    = \App\Models\Comment::class;
    protected static $position = 3.5;

    public static $with = ['commentable'];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Комментарии');
    }

    public static function singularLabel()
    {
        return __('Комментарий');
    }

    public static function uriKey()
    {
        return 'comment';
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
            Text::make(__('Запись'), function () {
                return $this->commentable->title;
            })->link(optional($this->commentable)->adminPath()),
            Datetime::make(__('Дата'), 'created_at'),
            Textarea::make(__('Текст'), 'text')->resolveUsing(function($value) {
                return Str::limit($value);
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
            Section::make(__('Запись')),
            Text::make(__('Дата'), 'created_at')->original()->display(),
            Text::make(__('Запись'), function() {
                return $this->commentable->title;
            })->link(optional($this->commentable->adminPath()))->display(),

            Section::make(__('Данные')),
            Text::make(__('Имя'), 'name')->original(),
            Textarea::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликован'), 'status'),
        ];
    }

    public static function notification()
    {
        return \App\Models\Comment::whereDate('created_at', '>', now()->subDays(3))->count();
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
        ];
    }
}
