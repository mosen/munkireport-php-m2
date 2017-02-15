<?php
namespace MrModule\DirectoryService;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;
    
    /**
     * @var array Hash of strings in the source text and their destination database fields.
     */
    protected $translate = [
        'Directory Service' => 'which_directory_service',
        'Active Directory Comments' => 'directory_service_comments',
        'Active Directory Forest' => 'adforest',
        'Active Directory Domain' => 'addomain',
        'Computer Account' => 'computeraccount',
        'Create mobile account at login' => 'createmobileaccount',
        'Require confirmation' => 'requireconfirmation',
        'Force home to startup disk' => 'forcehomeinstartup',
        'Mount home as sharepoint' => 'mounthomeassharepoint',
        'Use Windows UNC path for home' => 'usewindowsuncpathforhome',
        'Network protocol to be used' => 'networkprotocoltobeused',
        'Default user Shell' => 'defaultusershell',
        'Mapping UID to attribute' => 'mappinguidtoattribute',
        'Mapping user GID to attribute' => 'mappingusergidtoattribute',
        'Mapping group GID to attribute' => 'mappinggroupgidtoattr',
        'Generate Kerberos authority' => 'generatekerberosauth',
        'Preferred Domain controller' => 'preferreddomaincontroller',
        'Allowed admin groups' => 'allowedadmingroups',  // ARRAY alert
        'Authentication from any domain' => 'authenticationfromanydomain',
        'Packet signing' => 'packetsigning',
        'Packet encryption' => 'packetencryption',
        'Password change interval' => 'passwordchangeinterval',
        'Restrict Dynamic DNS updates' => 'restrictdynamicdnsupdates',
        'Namespace mode' => 'namespacemode'
    ];

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'directory_service';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $serialNumber
     * @param $data array A hash of data to process.
     * @return mixed|void
     * @throws \Exception
     */
    public function process($moduleName, $serialNumber, $data)
    {
        if (strpos($data, "\n") === false) {
            throw new \Exception("Invalid report data");
        }

        $directoryService = DirectoryService::firstOrNew(['serial_number' => $serialNumber]);
        $directoryService->serial_number = $serialNumber;

        $attrs = $this->parseTextRecord($data, " = ", $this->translate);
        foreach ($attrs as $k => $v) {
            if ($v === 'Enabled') {
                $attrs[$k] = true;
            } elseif ($v === 'Disabled') {
                $attrs[$k] = false;
            }
        }

        $directoryService->fill($attrs);
        $directoryService->save();
    }
}