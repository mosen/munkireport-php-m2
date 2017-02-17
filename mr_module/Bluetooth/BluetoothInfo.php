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

    //// RELATIONSHIPS

    /**
     * Retrieve the machine associated with this bluetooth information.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}