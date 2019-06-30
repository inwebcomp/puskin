<?php

namespace App;

use App\Models\Article;
use App\Models\Page;
use InWeb\Base\Support\Route;

class Breadcrumbs
{
    public static function news()
    {
        return [
            'title' => __('Новости'),
            'link'  => Route::route('news.index')
        ];
    }

    public static function events()
    {
        return [
            'title' => __('Мероприятия'),
            'link'  => Route::route('event.index')
        ];
    }
    public static function album()
    {
        return [
            'title' => __('Фотоальбом'),
            'link'  => Route::route('album.index')
        ];
    }

    public static function page(Page $page)
    {
        $path = [];

        $path[] = [
            'title' => $page->title,
            'link'  => $page->path()
        ];

        return $path;
    }

    public static function article(Article $article)
    {
        $path = [];

        if ($article->type == Article::NEWS) {
            $path[] = static::news();
        } else {
            $path[] = static::events();
        }

        $path[] = [
            'title' => $article->title,
            'link'  => $article->path()
        ];

        return $path;
    }
}