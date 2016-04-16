<?php


namespace App\Jobs;


use App\Events\ServerRunning;
use App\Server;

class ProvisionFactorio extends Job
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
        echo "PROVISIONING FACTORIO ON " . $this->server->ip . PHP_EOL;

        $cd = 'cd ' . app_path() . '/provisioning/factorio/';
        shell_exec($cd . ' && envoy run factorio_provision --host=root@' . $this->server->ip);

        echo "STARTING FACTORIO ON " . $this->server->name . PHP_EOL;
        shell_exec($cd . ' && envoy run factorio_start --host=root@' . $this->server->ip);
        
        $this->server->status = Server::RUNNING;
        $this->server->save();

        event(new ServerRunning($this->server));
        
    }
}