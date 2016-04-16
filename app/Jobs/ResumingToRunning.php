<?php


namespace App\Jobs;


use App\Events\ServerRunning;
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

                $server->status = Server::RUNNING;
                $server->save();

                event(new ServerRunning($server));
            }
        }
    }
}