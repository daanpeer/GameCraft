<?php


namespace App\Events;


class ServerDestroyed extends Event
{
    public $server;

    /**
     * ServerDestroyed constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
}