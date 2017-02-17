<?php
namespace Mr;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'mr_event';
    
    //// RELATIONSHIPS

    /**
     * Retrieve the machine instance associated with this event.
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}