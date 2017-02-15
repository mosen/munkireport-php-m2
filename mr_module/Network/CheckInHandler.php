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
        if (empty($data) || strpos($data, "\n") === false) {
            return; // No or invalid report
        }

        $services = array();
        $order = 1; // Service order
        
        foreach (explode("\n", $data) as $line) {
            if (preg_match('/^Service: (.*)$/', $line, $result)) {
                $service = $result[1];
                $services[$service] = ['status' => Network::STATUS_ENABLED];
                $services[$service]['order'] = $order++;
                continue;
            }

            // Skip lines before service starts
            if (!isset($service)) {
                continue;
            }

            // Translate standard entries
            if (strpos($line, ": ") !== false) {
                $kv = explode(": ", $line, 2);
                if (in_array($kv[0].": ", array_keys($this->translate))) {
                    $services[$service][$this->translate[$kv[0].": "]] = trim($kv[1]);
                    continue;
                }
            }

            if (strpos($line, 'disabled') !== false) {
                $services[$service]['status'] = Network::STATUS_DISABLED;
                // service disabled
                continue;
            }

            if (in_array($line, array_keys($this->ipv4conf))) {
                $services[$service]['ipv4conf'] = $this->ipv4conf[$line];
                continue;
            }
        }

        Network::where(['serial_number' => $serialNumber])->delete();

        foreach ($services as $service => $data) {
            if (isset($data['ethernet']) && strlen($data['ethernet']) == 17) {
                $nw = new Network;

                $nw->serial_number = $serialNumber;
                $nw->service = $service;
                $nw->fill($data);
                
                $nw->save();
            }
        }
    }
}