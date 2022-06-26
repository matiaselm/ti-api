<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tendency;

class CreateTendencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tendencies:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $names = ['Expansionist', 'Economic', 'Military', 'Objective', 'Political', 'Scientific', 'Unknown'];

        $response = [];
        foreach($names as $name) {
            $td = Tendency::where('name', $name)->first();
            if($td) {
                continue;
            }
            $td = new Tendency([
                'name' => $name
            ]);

            $td->save();
            $response[] = $td;
        }

        \Log::info(json_encode($response));
    }
}
