<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Disk Thresholds
    |--------------------------------------------------------------------------
    |
	| Thresholds for disk report widget. This array holds two values:
	| free gigabytes below which the level is set to 'danger'
	| free gigabytes below which the level is set as 'warning'
	| If there are more free bytes, the level is set to 'success'
    */
    'thresholds' => [
        'danger' => 5,
        'warning' => 10
    ]
];