<?php

Route::group(['prefix' => 'resource-tool/comments'], function () {
    Route::get('{resource}/{resourceId}', 'CommentsController@index');
});