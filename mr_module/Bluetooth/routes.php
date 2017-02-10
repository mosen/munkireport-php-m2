<?php
Route::group(['prefix' => 'ext'], function () {
    Route::resource('bluetooth', 'MrModule\Bluetooth\BluetoothController');
});
