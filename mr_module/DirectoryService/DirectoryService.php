<?php


namespace MrModule\DirectoryService;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class DirectoryService extends Model
{
    protected $table = 'directoryservice';

    protected $fillable = [
        'which_directory_service',
        'directory_service_comments',
        'adforest',
        'addomain',
        'computeraccount',
        'createmobileaccount',
        'requireconfirmation',
        'forcehomeinstartup',
        'mounthomeassharepoint',
        'usewindowsuncpathforhome',
        'networkprotocoltobeused',
        'defaultusershell',
        'mappinguidtoattribute',
        'mappingusergidtoattribute',
        'mappinggroupgidtoattr',
        'generatekerberosauth',
        'preferreddomaincontroller',
        'allowedadmingroups',
        'authenticationfromanydomain',
        'packetsigning',
        'packetencryption',
        'passwordchangeinterval',
        'restrictdynamicdnsupdates',
        'namespacemode'
    ];

    protected $casts = [
        'createmobileaccount' => 'boolean',
        'requireconfirmation' => 'boolean',
        'forcehomeinstartup' => 'boolean',
        'mounthomeassharepoint' => 'boolean',
        'usewindowsuncpathforhome' => 'boolean',

        'generatekerberosauth' => 'boolean',
        'authenticationfromanydomain' => 'boolean'
    ];

    //// RELATIONSHIPS

    /**
     * Fetch the ReportData model associated with this Dir Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportData() {
        return $this->belongsTo('Mr\ReportData', 'serial_number', 'serial_number');
    }

    /**
     * Fetch the Machine model associated with this Dir Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }

    //// SCOPES

    public function scopeBound(Builder $query) {
        return $query->whereIn('which_directory_service', ['Active Directory', 'LDAPv3']);
    }

    public function scopeUnbound(Builder $query) {
        return $query->whereNotIn('which_directory_service', ['Active Directory', 'LDAPv3']);
    }
}