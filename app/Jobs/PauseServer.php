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
        switch ($this->server->game) {
            case Server::GAME_FACTORIO:
                echo "STOPPING FACTORIO ON " . $this->server->name . PHP_EOL;
                $cd = 'cd ' . app_path() . '/provisioning/factorio/';
                shell_exec($cd . ' && envoy run factorio_stop --host=root@' . $this->server->ip);
                break;

            case Server::GAME_MINECRAFT:
                echo "STOPPING MINECRAFT ON " . $this->server->name . PHP_EOL;
                $cd = 'cd ' . app_path() . '/provisioning/minecraft/';
                shell_exec($cd . ' && envoy run minecraft_stop --host=root@' . $this->server->ip);
                break;
        }
        \DigitalOcean::droplet()->shutdown($this->server->do_id);

        $this->server->status = Server::PAUSING;
        $this->server->save();

        event(new ServerPaused($this->server));
    }
}