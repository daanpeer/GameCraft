<?php


namespace App\Jobs;


use App\Events\ServerProvisioning;
use App\Events\ServerStarted;
use App\Server;

class StartedToProvisioning extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::STARTED)->get();

        foreach ($servers as $server) {
            sleep(15);

            $server->status = Server::PROVISIONING;
            $server->save();

            event(new ServerProvisioning($server));
            
            if($server->game == Server::GAME_FACTORIO) {
                $this->dispatch(new ProvisionFactorio($server));
            } elseif($server->game == Server::GAME_MINECRAFT) {
                $this->dispatch(new ProvisionMinecraft($server));
            }

        }
    }
}