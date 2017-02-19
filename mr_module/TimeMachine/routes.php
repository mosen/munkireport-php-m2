<?php
Route::resource('timemachine', 'TimeMachineController');
Route::get('stats/timemachine', 'TimeMachineController@stats');
