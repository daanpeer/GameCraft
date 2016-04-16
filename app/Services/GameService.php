<?php
namespace App;


use Maknz\Slack\Facades\Slack;

class GameService
{
    protected $game;


    public function start()
    {
        Slack::send('Starting server');

        // @todo start $game
        // @todo slack send ip enzo

        Slack::send('Server started');
    }

    public function stop()
    {
        // @todo start $game
        // @todo slack send

        Slack::send('Stopped server');
    }

    public function resume()
    {
        // @todo start $game
        // @todo slack send

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