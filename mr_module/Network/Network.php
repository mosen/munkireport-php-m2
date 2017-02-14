<?php
namespace MrModule\Network;


use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $table = 'network';

    protected $fillable = [
        'service',
        'order',
        'status',
        'ethernet',
        'clientid',
        'ipv4conf',
        'ipv4ip',
        'ipv4mask',
        'ipv4router',
        'ipv6conf',
        'ipv6ip',
        'ipv6prefixlen',
        'ipv6router'
    ];
}