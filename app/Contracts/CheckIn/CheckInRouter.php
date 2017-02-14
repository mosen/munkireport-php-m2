<?php
namespace Mr\Contracts\CheckIn;


interface CheckInRouter
{
    /**
     * Handle registers a class implementing the CheckInHandler type to receive check in data for the
     * specified module name.
     * 
     * @param $moduleName
     * @param $className
     * @return mixed
     */
    public function addHandler($moduleName, $className);

    /**
     * Route an incoming request to the relevant checkin handler(s)
     * 
     * @param $moduleName
     * @param $serialNumber
     * @param $data
     * @return mixed
     */
    public function route($moduleName, $serialNumber, $data);
}