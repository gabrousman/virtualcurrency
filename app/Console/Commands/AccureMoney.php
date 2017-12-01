<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AccureMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AccureMoney';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding 0.25 to user money in every 30 minutes.';

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
        //
//         $this->info("Accure command called!");
    }
}
