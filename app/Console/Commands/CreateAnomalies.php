<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Anomaly;
use App\Models\AnomalyEffect;

class CreateAnomalies extends Command
{
    private $anomalies = [
        [
            'type' => 'Asteroid Field',
            'effects' => ['A ship cannot move through or into an asteroid field.']
        ],
        [
            'type' => 'Nebula',
            'effects' => [
                'A ship cannot move through, but may move into a nebula.',
                'If a space combat occurs in a nebula, the defender applies +1 to each combat roll of their ships during that combat.',
                'A ship that begins the “Movement” step of a tactical action in a nebula treats its move value as “1” for the duration of that step.'
            ]
        ],
        [
            'type' => 'Supernova',
            'effects' => ['A ship cannot move through or into a supernova.']
        ],
        [
            'type' => 'Gravity Rift',
            'effects' => [
                'A ship that will move out of or through a gravity rift at any time during its movement, applies +1 to its move value (This can allow a ship to reach the active system from farther away than it normally could).',
                'For each ship that would move out of or through a gravity rift, 1 die is rolled immediately before it exits the gravity rift system; on a result of 1–3, that ship is removed from the board.',
                'Dice are not rolled for units that are being transported by ships that have capacity.',
                'Units that are being transported are removed from the board if the ship transporting them is removed from the board.',
                'Units that are removed are returned to the player’s reinforcements.',
                'A gravity rift can affect the same ship multiple times during a single movement.',
                'A system that contains multiple gravity rifts is treated as a single gravity rift.'
            ]
        ]
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anomalies:create';

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
        Anomaly::truncate();
        AnomalyEffect::truncate();

        foreach($this->anomalies as $anomaly) {
            $new_anomaly = new Anomaly();
            
            $new_anomaly->fill([
                'type' => $anomaly['type'],
            ]);

            $new_anomaly->save();

            foreach($anomaly['effects'] as $effect) {
                $new_anomaly_effect = new AnomalyEffect();

                $new_anomaly_effect->fill([
                    'anomaly_id' => $new_anomaly->id,
                    'effect' => $effect
                ]);

                $new_anomaly_effect->save();
            }
        }
        return 0;
    }
}
