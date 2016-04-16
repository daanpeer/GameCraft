<?php


namespace App\Jobs;


use App\Events\ServerRunning;
use App\Server;

class ProvisionMinecraft
{
    private $server;

    /**
     * ProvisionFactorio constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

    public function handle()
    {
        echo "PROVISIONING MINECRAFT ON " . $this->server->name;// TODO

        $this->server->status = Server::RUNNING;
        $this->server->save();

        event(new ServerRunning($this->server));

    }
}