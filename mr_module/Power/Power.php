<?php
namespace MrModule\Power;


use Illuminate\Database\Eloquent\Model;

class Power extends Model
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