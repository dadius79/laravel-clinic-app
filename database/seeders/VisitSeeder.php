<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $visits = [
        [
            /*1*/
            'patient_id' => '1',
            'consultation' => '1',
            'doctor_id' => '3',
            'over_the_counter' => '0',
            'status' => 'Completed',
            'created_by' => '2'
        ],
        [
            /*2*/
            'patient_id' => '2',
            'consultation' => '0',
            'doctor_id' => NULL,
            'over_the_counter' => '1',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*3*/
            'patient_id' => '3',
            'consultation' => '1',
            'doctor_id' => '3',
            'over_the_counter' => '0',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*4*/
            'patient_id' => '4',
            'consultation' => '0',
            'doctor_id' => NULL,
            'over_the_counter' => '1',
            'status' => 'Completed',
            'created_by' => '2'
        ],
        [
            /*5*/
            'patient_id' => '5',
            'consultation' => '1',
            'doctor_id' => '3',
            'over_the_counter' => '0',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*6*/
            'patient_id' => '6',
            'consultation' => '0',
            'doctor_id' => NULL,
            'over_the_counter' => '1',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*7*/
            'patient_id' => '7',
            'consultation' => '1',
            'doctor_id' => '6',
            'over_the_counter' => '0',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*8*/
            'patient_id' => '8',
            'consultation' => '0',
            'doctor_id' => NULL,
            'over_the_counter' => '1',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*9*/
            'patient_id' => '9',
            'consultation' => '1',
            'doctor_id' => '6',
            'over_the_counter' => '0',
            'status' => 'Pending',
            'created_by' => '2'
        ],
        [
            /*10*/
            'patient_id' => '10',
            'consultation' => '0',
            'doctor_id' => NULL,
            'over_the_counter' => '1',
            'status' => 'Pending',
            'created_by' => '2'
        ],
    ];
    
    public function run()
    {
        foreach($this->visits as $index => $visit){
            $result = Visit::create($visit);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            }
        }

        $this->command->info("Inserted ".count($this->visits)." records.");
    }
}
