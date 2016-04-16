<?php


namespace App\Jobs;


use App\Server;

class SnapshottingToPaused extends Job
{
    public function handle()
    {
        $servers = Server::where('status', Server::SNAPSHOTTING)->get();

        foreach ($servers as $server)
        {
            $do = \DigitalOcean::droplet()->getById($server->do_id);

            if ($do->status == "active") {

                $snapshots = \DigitalOcean::droplet()->getSnapshots($server->do_id);
                \DigitalOcean::droplet()->delete($server->do_id);

                $server->snapshot = $snapshots[0]->id;
                $server->do_id = 0;
                $server->status = Server::PAUSED;
                $server->save();
            }
        }
    }
}