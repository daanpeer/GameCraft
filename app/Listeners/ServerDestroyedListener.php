<?php


namespace App\Listeners;


use App\Server;

class ServerDestroyedListener extends Listener
{
    public function handle($event)
    {
        if($event->server->game == Server::GAME_FACTORIO) {
            \Maknz\Slack\Facades\Slack::send("Factorio server deleted! Hope you had fun :)");
        } else {
            \Maknz\Slack\Facades\Slack::send("Minecraft server deleted! Hope you had fun :)");
        }
    }
}