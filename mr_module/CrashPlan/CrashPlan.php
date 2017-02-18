<?php
namespace MrModule\CrashPlan;


use Illuminate\Database\Eloquent\Model;

class CrashPlan extends Model
{
    protected $table = 'crashplan';

    protected $fillable = [
        'destination',
        'last_success',
        'duration',
        'last_failure',
        'reason'
    ];

    protected $casts = [
        'duration' => 'integer'
    ];

    //// RELATIONSHIPS

    /**
     * Retrieve the machine model associated with this crashplan entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}