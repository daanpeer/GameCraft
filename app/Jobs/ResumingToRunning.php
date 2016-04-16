<?php


namespace App\Jobs;


use App\Server;

class ResumingToRunning extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::RESUMING)->get();

        foreach($servers as $server) {
            $do = \DigitalOcean::droplet()->getById($server->do_id);
            if($do->status == "active") {
                echo "STARTING SERVER AGAIN";
                switch ($server->game) {
                    case Server::GAME_FACTORIO:
                        echo "STARTING FACTORIO ON " . $server->name . PHP_EOL;
                        $cd = 'cd ' . app_path() . '/provisioning/factorio/';
                        shell_exec($cd . ' && envoy run factorio_start --host=root@' . $server->ip);
                        break;

                    case Server::GAME_MINECRAFT:
                        echo "STARTING MINECRAFT ON " . $server->name . PHP_EOL;
                        $cd = 'cd ' . app_path() . '/provisioning/minecraft/';
                        shell_exec($cd . ' && envoy run minecraft_start --host=root@' . $server->ip);
                        break;
                }

                $server->status = Server::RUNNING;
                $server->save();
            }
        }
    }
}