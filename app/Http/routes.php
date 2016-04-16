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
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('/server', 'ServerController');
Route::resource('/server/{id}/resume', 'ServerController@resume');
Route::resource('/server/{id}/pause', 'ServerController@pause');

Route::group(['prefix' => 'api'], function () {
    Route::any('/slack', function (\Illuminate\Http\Request $request, GameService $gameService) {
        $token = $request->get('token');
        $team_id = $request->get('team_id');
        $team_domain = $request->get('team_domain');
        $channel_id = $request->get('channel_id');
        $channel_name = $request->get('channel_name');
        $user_id = $request->get('user_id');
        $user_name = $request->get('user_name');
        $command = $request->get('command');
        $arguments = explode(' ', $request->get('text'));

        if (strtolower($command) != '/gamecraft') return;

        $action = $arguments[0];
        $gameArgument = $arguments[1];

        switch (strtolower($gameArgument)) {
            case 'minecraft':
                echo 'minecraft';
                $gameService->setGame(Server::GAME_MINECRAFT);
                break;
            case 'factorio':
                echo 'factorio';
                $gameService->setGame(Server::GAME_FACTORIO);
                break;
            default:
                return 'Unknown game';
        }

        switch ($action) {
            case 'start':
                $gameService->start();

                break;
            case 'stop':
                $gameService->stop();

                break;
            case 'resume':
                $gameService->resume();

                break;
            case 'pause':
                $gameService->pause();

                break;
            default:
                return 'doe ff een goed command swa';
        }

        return;
    });
});
