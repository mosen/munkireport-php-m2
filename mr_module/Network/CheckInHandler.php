<?php
namespace MrModule\Network;

use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    // Translate network strings to db fields
    protected $translate = array(
        'Ethernet Address: ' => 'ethernet',
        'Client ID: ' => 'clientid',
        'Wi-Fi ID: ' => 'ethernet',
        'IP address: ' => 'ipv4ip',
        'Subnet mask: ' => 'ipv4mask',
        'Router: ' => 'ipv4router',
        'IPv6: ' => 'ipv6conf',
        'IPv6 IP address: ' => 'ipv6ip',
        'IPv6 Prefix Length: ' => 'ipv6prefixlen',
        'IPv6 Router: ' => 'ipv6router'
    );

    // ipv4 dhcp configuration strings
    // Unfortunately you cannot detect if IPv4 is off with
    // netwerksetup -getinfo
    protected $ipv4conf = array(
        'DHCP Configuration' => 'dhcp',
        'Manually Using DHCP Router Configuration' => 'manual',
        'BOOTP Configuration' => 'bootp',
        'Manual Configuration' => 'manual'
    );

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'network';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {

    }
}