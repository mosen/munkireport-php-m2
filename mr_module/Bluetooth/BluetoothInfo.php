<?php
namespace MrModule\Bluetooth;


use Illuminate\Database\Eloquent\Model;

class BluetoothInfo extends Model
{
    protected $table = 'bluetooth';

    protected $fillable = [
        'battery_percent',
        'device_type',
    ];
}