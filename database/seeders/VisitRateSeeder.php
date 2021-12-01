<?php

namespace Database\Seeders;

use App\Models\VisitRate;
use Illuminate\Database\Seeder;

class VisitRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $visitrates = [
        [
            'visit_type' => 'IP',
            'rate' => '5000',
            'available' => '1',
        ],
        [
            'visit_type' => 'OP',
            'rate' => '2500',
            'available' => '1',
        ]
    ];
    
    public function run()
    {
        foreach($this->visitrates as $index => $visitrate){
            $result = VisitRate::create($visitrate);

            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->visitrates)." records.");
    }
}
