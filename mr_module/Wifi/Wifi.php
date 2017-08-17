<?php
namespace MrModule\Wifi;

use Mr\Scopes\VueTableScope;
use Mr\SerialNumberModel;

class Wifi extends SerialNumberModel
{
    protected $table = 'wifi';

    protected $fillable = [
        'agrctlrssi',
        'agrextrssi',
        'agrctlnoise',
        'agrextnoise',
        'state',
        'op_mode',
        'lasttxrate',
        'lastassocstatus',
        'maxrate',
        'x802_11_auth',
        'link_auth',
        'bssid',
        'ssid',
        'mcs',
        'channel'
    ];

    protected $casts = [
        'agrctlrssi' => 'integer',
        'agrextrssi' => 'integer',
        'agrctlnoise' => 'integer',
        'agrextnoise' => 'integer',
        'lasttxrate' => 'integer',
        'maxrate' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new VueTableScope());
    }

    
}