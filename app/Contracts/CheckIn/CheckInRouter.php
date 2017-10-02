<?php
namespace Mr\Contracts\CheckIn;


interface CheckInRouter
{
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