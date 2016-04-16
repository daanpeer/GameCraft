<?php


namespace App\Jobs;


use App\Events\ServerStarted;
use App\Server;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        $cd = 'cd ' . app_path() . '/provisioning/minecraft/';
        shell_exec($cd . ' && envoy run minecraft_provision --host=root@' . $this->server->ip);

        shell_exec($cd . ' && envoy run minecraft_start --host=root@' . $this->server->ip);

        $this->server->status = Server::RUNNING;
        $this->server->save();
        event(new ServerStarted($this->server));
    }
}