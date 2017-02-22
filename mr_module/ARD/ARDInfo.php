<?php
namespace MrModule\ARD;

use Illuminate\Database\Eloquent\Model;

class ARDInfo extends Model
{
    protected $table = 'ard';

    protected $fillable = [
        'serial_number',
        'Text1',
        'Text2',
        'Text3',
        'Text4'
    ];

    //// RELATIONSHIPS

    /**
     * Fetch the ReportData model associated with this ARDInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportData() {
        return $this->belongsTo('Mr\ReportData', 'serial_number', 'serial_number');
    }

    /**
     * Fetch the Machine model associated with this ARDInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}