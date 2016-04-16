<?php


namespace App\Jobs;


use App\Server;

class ResumeServer extends Job
{
    private $server;

    /**
     * ResumeServer constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

    public function handle()
    {
        $do = \DigitalOcean::droplet()->create($this->server->name, 'ams3', '2gb', $this->server->snapshot, false, false, false, [
            "05:95:d5:ad:01:d8:b3:f8:8b:56:97:8e:37:32:3c:3d",
            "c7:a3:d0:95:0e:f6:53:5b:95:db:b5:2a:fd:14:d7:63"
        ]);

        $this->server->do_id = $do->id;
        $this->server->status = Server::RESUMING;
        $this->server->save();
    }
}