<?php

Route::group(['prefix' => 'resource-tool/schedule'], function () {
    Route::get('{resource}/{resourceId}', 'ScheduleController@forClass');
    Route::get('search', 'ScheduleController@search');
    Route::post('{resource}/{resourceId}', 'ScheduleController@update');
});