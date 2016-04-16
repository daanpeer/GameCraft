<?php


namespace App\Jobs;


use App\Events\ServerPaused;
use App\Server;

class PauseServer extends Job
{
    private $server;

    /**
     * PauseServer constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

    public function handle()
    {
        echo "STOP SERVER";//TODO

        \DigitalOcean::droplet()->shutdown($this->server->do_id);

        $this->server->status = Server::PAUSING;
        $this->server->save();

        event(new ServerPaused($this->server));
    }
}