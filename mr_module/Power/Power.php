<?php
namespace MrModule\Power;


use Illuminate\Database\Eloquent\Model;
use Mr\SerialNumberModel;

class Power extends SerialNumberModel
{
    protected $table = 'power';

    protected $fillable = [
        'serial_number',
        'manufacture_date',
        'design_capacity',
        'max_capacity',
        'max_percent',
        'current_capacity',
        'current_percent',
        'cycle_count',
        'temperature',
        'condition'
    ];
}