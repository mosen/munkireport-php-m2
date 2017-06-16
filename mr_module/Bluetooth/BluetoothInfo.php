<?php
namespace MrModule\Bluetooth;

use Mr\Scopes\VueTableScope;
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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new VueTableScope());
    }

    //// RELATIONSHIPS
}