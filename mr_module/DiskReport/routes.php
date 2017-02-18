<?php
Route::resource('diskreport', 'DiskReportController');
Route::get('stats/diskreport/free_space', 'DiskReportController@stats_free_space');

