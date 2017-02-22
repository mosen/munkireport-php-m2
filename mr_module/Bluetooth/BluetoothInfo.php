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

    protected $casts = [
        'battery_percent' => 'integer'
    ];

    //// RELATIONSHIPS
    
    /**
     * Fetch the ReportData model associated with this BluetoothInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportData() {
        return $this->belongsTo('Mr\ReportData', 'serial_number', 'serial_number');
    }

    /**
     * Fetch the Machine model associated with this BluetoothInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}