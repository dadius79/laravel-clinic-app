<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $consultations = [
        [
            /*1*/
            /*doctor 3*/
            'visit_id' => '1',
            'details' => 'Sample Details',
            'consultation_fee' => '1500',
            'status' => 'Completed',
        ],
        [
            /*2*/
            /*doctor 3*/
            'visit_id' => '3',
            'details' => NULL,
            'consultation_fee' => NULL,
            'status' => 'Pending',
        ],
        [
            /*3*/
            /*doctor 3*/
            'visit_id' => '5',
            'details' => 'Sample Details',
            'consultation_fee' => '1500',
            'status' => 'Completed',
        ],
        [
            /*4*/
            /*doctor 6*/
            'visit_id' => '7',
            'details' => NULL,
            'consultation_fee' => NULL,
            'status' => 'Pending',
        ],
        [
            /*5*/
            /*doctor 6*/
            'visit_id' => '9',
            'details' => 'Sample Details',
            'consultation_fee' => '3500',
            'status' => 'Completed',
        ],
    ];
    
    public function run()
    {
        foreach($this->consultations as $index => $consultation){
            $result = Consultation::create($consultation);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            } 
        }

        $this->command->info("Inserted ".count($this->consultations)." records.");
    }
}
