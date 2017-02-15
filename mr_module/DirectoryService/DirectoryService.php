<?php


namespace MrModule\DirectoryService;


use Illuminate\Database\Eloquent\Model;

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
}