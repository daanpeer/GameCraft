<?php


namespace App\Events;


class ServerStarted extends Event
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