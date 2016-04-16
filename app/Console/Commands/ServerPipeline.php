<?php

namespace App\Console\Commands;

use App\Jobs\StartedToProvisioning;
use App\Jobs\StartingToStarted;
use Illuminate\Console\Command;

class ServerPipeline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:pipeline';

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
        $this->dispatch(new StartingToStarted());
        $this->dispatch(new StartedToProvisioning());
    }
}
