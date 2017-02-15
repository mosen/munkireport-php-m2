<?php
namespace MrModule\Display;


use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    const TYPE_INTERNAL = 0;
    const TYPE_EXTERNAL = 1;

    protected $table = 'displays';

    protected $fillable = [
        'type',
        'display_serial',
        'vendor',
        'model',
        'manufactured',
        'native'
    ];

    protected $casts = [
        'type' => 'integer',
        'manufactured' => 'date'
    ];
}