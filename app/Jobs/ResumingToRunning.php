<?php


namespace App\Jobs;


use App\Events\ServerStarted;
use App\Server;

class ResumingToRunning extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::RESUMING)->get();

        foreach($servers as $server) {
            $do = \DigitalOcean::droplet()->getById($server->do_id);
            if($do->status == "active") {
                $server->ip = $do->networks[0]->ipAddress;
                $server->save();

                switch ($server->game) {
                    case Server::GAME_FACTORIO:
                        $cd = 'cd ' . app_path() . '/provisioning/factorio/';
                        shell_exec($cd . ' && envoy run factorio_start --host=root@' . $server->ip);
                        break;

                    case Server::GAME_MINECRAFT:
                        $cd = 'cd ' . app_path() . '/provisioning/minecraft/';
                        shell_exec($cd . ' && envoy run minecraft_start --host=root@' . $server->ip);
                        break;
                }

                $server->status = Server::RUNNING;
                $server->save();

                event(new ServerStarted($server));
            }
        }
    }
}