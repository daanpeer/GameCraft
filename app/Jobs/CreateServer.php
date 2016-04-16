<?php


namespace App\Jobs;


use App\Events\ServerStarting;
use App\Server;

class CreateServer extends Job
{
    private $game;

    /**
     * CreateServer constructor.
     * @param $game
     */
    public function __construct($game)
    {
        $this->game = $game;
    }

    public function handle()
    {
        $name = str_random();

        $createdDroplet = \DigitalOcean::droplet()->create($name, 'ams3', '2gb', 'ubuntu-14-04-x64');

        $server = new Server();

        $server->fill([
            'do_id' => $createdDroplet->id,
            'status' => Server::STARTING,
            'name' => $name
        ]);

        if($this->game == 'factorio') {
            $server->game = Server::GAME_FACTORIO;
        } elseif($this->game == 'minecraft') {
            $server->game = Server::GAME_MINECRAFT;
        }

        $server->save();

        event(new ServerStarting($server));
    }
}