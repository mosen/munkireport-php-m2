<?php
Route::resource('diskreport', 'DiskReportController');
Route::get('stats/diskreport/free_space', 'DiskReportController@stats_free_space');
Route::get('stats/diskreport/filevault_status', 'DiskReportController@stats_filevault_status');
Route::get('stats/diskreport/smart_status', 'DiskReportController@stats_smart_status');

