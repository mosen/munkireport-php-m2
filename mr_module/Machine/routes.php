<?php
Route::group(['prefix' => 'ext'], function () {
    Route::resource('machine', 'MrModule\Machine\MachineController');
});
