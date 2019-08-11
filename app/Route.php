<?php


namespace App;


class Route
{
    public static function pathForLanguage($locale, $meta = null)
    {
        $path = request()->path();

        if (\App::getLocale() != config('inweb.default_language'))
            $path = trim(substr($path, 2), '/');

        if ($locale != config('inweb.default_language'))
            $path = $locale . '/' . $path;

        if (! $meta or ! isset($meta['slug']) or ! isset($meta['slug_alternative']) or $locale == \App::getLocale())
            return $path;

        if (! $meta['slug'] or ! $meta['slug_alternative'])
            return $path;

        $path = '/' . $path;

        if ($meta['slug'] and $meta['slug_alternative'])
            $path = str_replace('/' . $meta['slug'], '/' . $meta['slug_alternative'], $path);

        return trim($path, '/');
    }
}