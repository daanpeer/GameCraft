<?php
namespace App;


use App\Jobs\CreateServer;
use App\Jobs\DestroyServer;
use App\Jobs\ResumeServer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Maknz\Slack\Facades\Slack;

class GameService
{
    use DispatchesJobs;

    protected $game;

    public function start()
    {
        $existingServer = Server::where('game', $this->getGame())->first();

        if($existingServer != null) {
            Slack::send('There is already a server running this game :o');
            return;
        }


        Slack::send('Starting server');

        $this->dispatch(new CreateServer($this->getGame()));
    }

    public function stop()
    {
        $server = Server::where('game', $this->getGame())->first();

        if($server == null) {
            Slack::send("I can't find a server with this game.");

            return;
        }

        $this->dispatch(new DestroyServer($server));
    }

    public function resume()
    {
        $server = Server::where('game', $this->getGame())->first();

        if($server == null) {
            Slack::send("I can't find a server with this game.");

            return;
        }

        $this->dispatch(new ResumeServer($server));
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }
}