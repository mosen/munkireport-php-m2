<?php
namespace MrModule\Machine;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{

    //// SCOPES

    public function scopeDuplicate($query) {
        return $query;
    }
}