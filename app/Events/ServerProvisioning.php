<?php


namespace App\Events;


class ServerProvisioning extends Event
{
    public $server;

    /**
     * ServerProvisioning constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }


}