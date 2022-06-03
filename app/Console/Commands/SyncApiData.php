<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\SyncData;

class SyncApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:apidata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync the API Data inside the Database';

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
     * @return int
     */
    public function handle()
    {
        $sync = new SyncData;
        $sync->campaigns();
        $sync->designations();
        $sync->users();
        $sync->inactiveUsers();
    }
}
