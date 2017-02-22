<?php
namespace MrModule\Bluetooth;

use Illuminate\Database\Eloquent\Model;
use Mr\RelatedBySerialNumber;

class BluetoothInfo extends Model
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
    
    use RelatedBySerialNumber;
}