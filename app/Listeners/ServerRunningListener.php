<?php


namespace App\Listeners;


use App\Server;

class ServerRunningListener extends Listener
{
    public function handle($event) {
        if($event->server->game == Server::GAME_FACTORIO) {
            \Maknz\Slack\Facades\Slack::send("Factorio server started! Connect on ip: `" . $event->server->ip."`. Click here to start Factorio: steam://run/427520. Have fun :)");
        } else {
            \Maknz\Slack\Facades\Slack::send("Minecraft server started! Connect on ip: `" . $event->server->ip."`. Have fun :)");
        }
    }
}