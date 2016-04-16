<?php
namespace App;


use App\Jobs\CreateServer;
use App\Jobs\DestroyServer;
use App\Jobs\PauseServer;
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

        if($server->status != Server::RUNNING) {
            Slack::send("The server must be running in order to stop it.");
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

        if($server->status != Server::PAUSED) {
            Slack::send("The server must be paused in order to resume it.");
            return;
        }

        $this->dispatch(new ResumeServer($server));
    }

    public function pause()
    {
        $server = Server::where('game', $this->getGame())->first();

        if($server == null) {
            Slack::send("I can't find a server with this game.");

            return;
        }

        if($server->status != Server::RUNNING) {
            Slack::send("The server must be running in order to pause it.");
            return;
        }

        $this->dispatch(new PauseServer($server));
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