<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\System;
use App\Models\Planet;

class AddSystems extends Command
{
    private $systems = [
        
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'systems:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add systems to db';

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
