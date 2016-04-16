<?php
namespace App;


use Maknz\Slack\Facades\Slack;

class GameService
{
    protected $game;


    public function start()
    {
        Slack::send('Starting server');
        /// lalala

        // @todo: ip enzo
        Slack::send('Server started');

    }

    public function stop()
    {
        Slack::send('Stop server');
    }

    public function resume()
    {
        Slack::send('Resuming server');
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