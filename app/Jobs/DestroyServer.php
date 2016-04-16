<?php


namespace App\Jobs;


use App\Events\ServerDestroyed;

class DestroyServer extends Job
{
    private $server;

    /**
     * DestroyServer constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

    public function handle()
    {
        \DigitalOcean::droplet()->delete($this->server->do_id);

        $this->server->delete();
        
        event(new ServerDestroyed($this->server));
    }
}