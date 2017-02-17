<?php
Route::resource('certificate', 'CertificateController');
Route::get('stats/certificate', 'CertificateController@stats');
