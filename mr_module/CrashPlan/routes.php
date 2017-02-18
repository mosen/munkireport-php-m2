<?php
Route::resource('crashplan', 'CrashPlanController');
Route::get('stats/crashplan', 'CrashPlanController@stats');
