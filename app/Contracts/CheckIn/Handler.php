<?php
namespace Mr\Contracts\CheckIn;


interface Handler
{
    /**
     * Class must have a public static variable declaring the types of reports it can handle.
     */
    //abstract public static $handles = [];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data);
}