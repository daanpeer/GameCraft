<?php


namespace app\Jobs;


class PausingToSnapshotting extends Job
{
    private $server;

    /**
     * PausingToSnapshotting constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
    
    public function handle()
    {
        $do = \DigitalOcean::droplets()->getById($this->server->do_id);

        dd($do->status);
    }
}