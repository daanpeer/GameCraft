<?php


namespace App\Jobs;


use App\Events\ServerStarting;
use App\Server;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class CreateServer extends Job implements ShouldQueue
{
    use SerializesModels;

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
            "05:95:d5:ad:01:d8:b3:f8:8b:56:97:8e:37:32:3c:3d",
            "c7:a3:d0:95:0e:f6:53:5b:95:db:b5:2a:fd:14:d7:63"
        ]);

        $server = new Server();

        $server->fill([
            'do_id' => $createdDroplet->id,
            'status' => Server::STARTING,
            'name' => $name
        ]);

        $server->game = $this->game;

        $server->save();

        event(new ServerStarting($server));
    }
}