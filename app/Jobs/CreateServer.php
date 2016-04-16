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

        $createdDroplet = \DigitalOcean::droplet()->create($name, 'ams3', '2gb', 'ubuntu-14-04-x64', false, false, false, [
            file_get_contents("~/.ssh/id_rsa.pub"),
            "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDHLUA0zfzapUDn4lkGB7vxRjQoIEar5LQDS/ETUrQlet/JtSdX779kmFeskzCWE/+e6CiZpiQrysXv3Xk/VTeXyAeK4c1BsJnZxGQUOco909UXin12BvlYp3L7gfE5a2Ssbks+VDzFTCfQSQi5NRTPIQDgg7pfyRovTOAdsrCI4Chdajxaab3U3iG9IpmviDPq+XJ9d9nRfnUDaY1nO13LqxpoRstaRZIZ8u3FDwNfR7aQKl8aUEd5iww/I4aCPR6P7myCy5M90DVJAK8PaFirFXpZB2vFoMZOkbW8Pcq5uG/ll5mLIAarNJAzlDIBQLrNi20hgHp29t6LD4MdqNbX Daan@MacRocket.local"
        ]);

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