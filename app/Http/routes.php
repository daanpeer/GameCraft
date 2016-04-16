<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\GameService;
use App\Server;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api'], function () {
    Route::any('/slack', function (Request $request, GameService $gameService) {
        $token = $request->get('token');
        $team_id = $request->get('team_id');
        $team_domain = $request->get('team_domain');
        $channel_id = $request->get('channel_id');
        $channel_name = $request->get('channel_name');
        $user_id = $request->get('user_id');
        $user_name = $request->get('user_name');
        $command = $request->get('command');
        $arguments = explode(' ', $request->get('text'));

        if ($command != '/gamecraft') return;

        $action = $arguments[0];
        $gameArgument = $arguments[1];

        switch ($gameArgument) {
            case 'minecraft':
                $gameService->setGame(Server::GAME_MINECRAFT);
                break;
            case 'factorio':
                $gameService->setGame(Server::GAME_FACTORIO);
                break;
            default:
                return 'Unknown game';
        }

        switch ($action) {
            case 'start':
                $gameService->start();

                return 'Starting game';
            case 'stop':
                $gameService->stop();

                return 'Stopping game';
            case 'resume':
                $gameService->resume();

                return 'Resume game';
        }

        return 'doe ff een goed command swa';
    });
});
