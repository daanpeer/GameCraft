<?php


namespace App\Jobs;


use App\Server;

class PausingToSnapshotting extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::PAUSING)->get();

        foreach ($servers as $server)
        {
            $do = \DigitalOcean::droplet()->getById($server->do_id);

            if ($do->status == "off") {
                \DigitalOcean::droplet()->snapshot($server->do_id, $server->name . date('c'));

                $server->status = Server::SNAPSHOTTING;
                $server->save();
            }
        }
    }
}