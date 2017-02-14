<?php
namespace MrModule\Display;


use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    protected $table = 'display';

    protected $fillable = [
        'type',
        'display_serial',
        'vendor',
        'model',
        'manufactured',
        'native'
    ];
}