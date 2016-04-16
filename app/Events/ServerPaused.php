<?php


namespace App\Events;


class ServerPaused extends Event
{
    public $server;

    /**
     * ServerPaused constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
}