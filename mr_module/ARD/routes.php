<?php
Route::group(['prefix' => 'ext'], function () {
    Route::resource('ard', 'MrModule\ARD\ARDController');
});

