<?php
namespace MrModule\Wifi;


use Illuminate\Database\Eloquent\Model;

class Wifi extends Model
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
}