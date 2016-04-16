<?php


namespace App\Events;


class ServerStarting extends Event
{
    public $server;

    /**
     * ServerStarting constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
}