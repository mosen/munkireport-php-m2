<?php
namespace MrModule\Security;


use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    protected $table = 'security';

    protected $fillable = [
        'serial_number',
        'gatekeeper',
        'sip'
    ];
}