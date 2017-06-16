<?php
namespace MrModule\Printer;

use Illuminate\Database\Eloquent\Model;
use Mr\Scopes\VueTableScope;
use Mr\SerialNumberModel;

class Printer extends SerialNumberModel
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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new VueTableScope());
    }
    
}