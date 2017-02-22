<?php
namespace MrModule\Certificate;

use Mr\SerialNumberModel;

class Certificate extends SerialNumberModel
{
    protected $table = 'certificate';

    protected $casts = [
        'cert_exp_time' => 'datetime'
    ];

    protected $fillable = [
        'cert_exp_time',
        'cert_path',
        'cert_cn'
    ];

    //// RELATIONSHIPS
}