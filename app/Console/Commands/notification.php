<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification to alazkar and alsalawat';

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
        return 0;
    }
}