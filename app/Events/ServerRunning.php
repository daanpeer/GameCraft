<?php


namespace App\Events;


class ServerRunning extends Event
{
    public $server;

    /**
     * ServerRunning constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

}