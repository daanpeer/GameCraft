<?php
namespace App;


class GameService
{
    protected $game;

    public function start()
    {
        //@todo start event
    }

    public function stop()
    {

    }

    public function resume()
    {

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