<?php
namespace MrModule\Certificate;

use Illuminate\Database\Eloquent\Model;
use Mr\RelatedBySerialNumber;

class Certificate extends Model
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

    use RelatedBySerialNumber;
}