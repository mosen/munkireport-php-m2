<?php
namespace MrModule\Security;

use Mr\Scopes\VueTableScope;
use Mr\SerialNumberModel;

class Security extends SerialNumberModel
{
    protected $table = 'security';

    protected $fillable = [
        'serial_number',
        'gatekeeper',
        'sip'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new VueTableScope());
    }

    //// RELATIONSHIPS

    public function diskreport()
    {
        
    }
}