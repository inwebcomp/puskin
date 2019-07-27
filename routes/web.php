<?php

if (\App::runningUnitTests()) {
    $locale = \App::getLocale();
} else {
    $locale = request()->segment(1);
}

if (strlen($locale) !== 2) {
    $locale = '';
} else {
    request()->merge([
        'locale' => $locale
    ]);
}

Route::group(['prefix' => $locale], function () {
    Route::get('', "PageController@index")->name('index');
    Route::get('contacts', "PageController@index")->name('contacts');
    Route::get('schedule', "PageController@schedule")->name('schedule');

    Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
        Route::get('', "NewsController@index")->name('index');
        Route::get('{article}', "NewsController@show")->name('show');
    });

    Route::group(['prefix' => 'event', 'as' => 'event.'], function() {
        Route::get('', "EventController@index")->name('index');
        Route::get('{article}', "EventController@show")->name('show');
    });

    Route::group(['prefix' => 'album', 'as' => 'album.'], function() {
        Route::get('', "AlbumController@index")->name('index');
        Route::get('{album}', "AlbumController@show")->name('show');
    });

    Route::group(['prefix' => 'class', 'as' => 'class.'], function() {
        Route::get('', "ClassController@index")->name('index');
        Route::get('{class}', "ClassController@show")->name('show');
    });

    Route::get('{page}', "PageController@show")->where('page', '^(?!' . config('admin.path') . ')(.)*$')->name('page');
});