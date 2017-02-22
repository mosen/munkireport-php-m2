<?php
namespace MrModule\Bluetooth;

use Mr\SerialNumberModel;

class BluetoothInfo extends SerialNumberModel
{
    protected $table = 'bluetooth';

    protected $fillable = [
        'battery_percent',
        'device_type',
    ];

    protected $casts = [
        'battery_percent' => 'integer'
    ];

    //// RELATIONSHIPS
}