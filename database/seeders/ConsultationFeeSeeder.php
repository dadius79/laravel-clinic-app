<?php

namespace Database\Seeders;
use App\Models\ConsultationFee;

use Illuminate\Database\Seeder;

class ConsultationFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $consultationfees = [
        [
            'doctor_id' => '3',
            'fees' => '1500',
            'active' => '1',
        ],
        [
            'doctor_id' => '6',
            'fees' => '3500',
            'active' => '1',
        ],
    ];
    public function run()
    {
        foreach($this->consultationfees as $index => $consultationfee){
            $result = ConsultationFee::create($consultationfee);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            }
        }

        $this->command->info("Inserted ".count($this->consultationfees)." records");
    }
}
