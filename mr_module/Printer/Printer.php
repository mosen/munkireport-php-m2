<?php
namespace MrModule\Printer;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $table = 'printer';

    protected $fillable = [
        'name',
        'ppd',
        'driver_version',
        'url',
        'default_set',
        'printer_status',
        'printer_sharing'
    ];
    
}