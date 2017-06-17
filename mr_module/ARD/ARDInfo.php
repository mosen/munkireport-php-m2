<?php
namespace MrModule\ARD;

use Mr\Scopes\VueTableScope;
use Mr\SerialNumberModel;

class ARDInfo extends SerialNumberModel
{
    protected $table = 'ard';

    protected $fillable = [
        'serial_number',
        'Text1',
        'Text2',
        'Text3',
        'Text4'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new VueTableScope());
    }

    //// RELATIONSHIPS
}