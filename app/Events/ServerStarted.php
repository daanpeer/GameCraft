<?php


namespace App\Events;


class ServerRunning extends Event
{
    public $server;

    /**
     * ServerStarted constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
}