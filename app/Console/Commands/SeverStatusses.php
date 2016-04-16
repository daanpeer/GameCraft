<?php

namespace App\Console\Commands;

use App\Server;
use Illuminate\Console\Command;

class SeverStatusses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:statusses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $servers = Server::where('status', Server::STARTING)->get();

        foreach ($servers as $server) {
            $do = \DigitalOcean::droplet()->getById($server->do_id);

            dd($do->status);
//            if($do->status != "new") {
//                $server->status = Server::STARTED;
//                $server->ip = $do->networks[0]->ipAddress;

                $server->save();
//            }
        }
    }
}
