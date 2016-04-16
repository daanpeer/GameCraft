<?php


namespace App\Listeners;


use App\Server;

class ServerPausedListener extends Listener
{
    public function handle($event)
    {
        if($event->server->game == Server::GAME_FACTORIO) {
            \Maknz\Slack\Facades\Slack::send("Factorio server paused! Hope you had fun :)");
        } else {
            \Maknz\Slack\Facades\Slack::send("Minecraft server paused! Hope you had fun :)");
        }
    }
}