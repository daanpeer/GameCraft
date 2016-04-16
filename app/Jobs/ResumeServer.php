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
        $do = \DigitalOcean::droplet()->create($this->server->name, 'ams3', '2gb', $this->server->snapshot);

        $this->server->do_id = $do->id;
        $this->server->status = Server::RESUMING;
        $this->server->save();
    }
}