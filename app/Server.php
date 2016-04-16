<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Server
 *
 * @mixin \Eloquent
 */
class Server extends Model
{
    // id, da_id, game, name, ip, status, deleted_at, created_at, updated_at

    protected $guarded = [];

    const GAME_FACTORIO = 0;
    const GAME_MINECRAFT = 1;

    const STARTING = 0;
    const STARTED = 1;
    const PROVISIONING = 2;
    const RUNNING = 3;
    const STOPPING = 4;
    const STOPPED = 5;
    const PAUSED = 6;
    const PAUSING = 7;
    const SNAPSHOTTING = 8;
}