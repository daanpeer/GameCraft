<?php


namespace App\Jobs;


use App\Server;

class StartingToStarted extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::STARTING)->get();

        foreach ($servers as $server) {
            $do = \DigitalOcean::droplet()->getById($server->do_id);

            if($do->status != "new") {
                $server->status = Server::STARTED;
                $server->ip = $do->networks[0]->ipAddress;

                $server->save();
            }
        }
    }

}