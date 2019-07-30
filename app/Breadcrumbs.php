<?php

namespace App;

use App\Models\Album;
use App\Models\Article;
use App\Models\ClassModel;
use App\Models\Page;
use App\Models\Teacher;

class Breadcrumbs
{
    public static function news()
    {
        return [
            'title' => __('Новости'),
            'link'  => Article::pathAllNews(),
        ];
    }

    public static function events()
    {
        return [
            'title' => __('Мероприятия'),
            'link'  => Article::pathAllEvents(),
        ];
    }

    public static function album(Album $album = null)
    {
        $path = [];

        $path[] = [
            'title' => __('Фотоальбом'),
            'link'  => Album::pathAll(),
        ];

        if ($album) {
            $path[] = [
                'title' => $album->title,
                'link'  => $album->path()
            ];
        }

        return $path;
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

    public static function classes(ClassModel $class = null)
    {
        $path = [];

        $path[] = [
            'title' => __('Классы'),
            'link'  => ClassModel::pathAll(),
        ];

        if ($class) {
            $path[] = [
                'title' => $class->title,
                'link'  => $class->path()
            ];
        }

        return $path;
    }

    public static function teachers(Teacher $teacher = null)
    {
        $path = [];

        $path[] = [
            'title' => __('Учителя'),
            'link'  => Teacher::pathAll(),
        ];

        if ($teacher) {
            $path[] = [
                'title' => $teacher->name,
                'link'  => $teacher->path()
            ];
        }

        return $path;
    }
}