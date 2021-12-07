<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $prescriptions = [
        [
            'visit_id' => '1',
            'medicine_code' => 'MED001',
            'strength' => '10 gms',
            'dose' => '1x2',
            'quantity' => '10',
            'amount' => '100.00',
            'issuance' => 'Completed',
            'prescribed_by' => '3',
            'issued_by' => '4',
        ],
        [
            'visit_id' => '1',
            'medicine_code' => 'MED002',
            'strength' => '10 gms',
            'dose' => '2x4',
            'quantity' => '2',
            'amount' => '30.00',
            'issuance' => 'Completed',
            'prescribed_by' => '3',
            'issued_by' => '4',
        ],
        [
            'visit_id' => '1',
            'medicine_code' => 'MED007',
            'strength' => '40 gms',
            'dose' => '2X3',
            'quantity' => '10',
            'amount' => '170',
            'issuance' => 'Completed',
            'prescribed_by' => '3',
            'issued_by' => '4',
        ],
        [
            'visit_id' => '5',
            'medicine_code' => 'MED008',
            'strength' => '150 gms',
            'dose' => '1x3',
            'quantity' => '5',
            'amount' => '2750',
            'issuance' => 'Pending',
            'prescribed_by' => '3',
            'issued_by' => NULL,
        ],
        [
            'visit_id' => '5',
            'medicine_code' => 'MED010',
            'strength' => '20 gms',
            'dose' => '2X3',
            'quantity' => '4',
            'amount' => '292',
            'issuance' => 'Pending',
            'prescribed_by' => '3',
            'issued_by' => NULL,
        ],
        [
            'visit_id' => '5',
            'medicine_code' => 'MED003',
            'strength' => '50 gms',
            'dose' => '1x3',
            'quantity' => '5',
            'amount' => '2500',
            'issuance' => 'Pending',
            'prescribed_by' => '3',
            'issued_by' => NULL,
        ],
        [
            'visit_id' => '4',
            'medicine_code' => 'MED003',
            'strength' => '50 gms',
            'dose' => '1x3',
            'quantity' => '4',
            'amount' => '2000',
            'issuance' => 'Completed',
            'prescribed_by' => '4',
            'issued_by' => '4',
        ],
        [
            'visit_id' => '6',
            'medicine_code' => 'MED009',
            'strength' => '100 gms',
            'dose' => '2x3',
            'quantity' => '7',
            'amount' => '609',
            'issuance' => 'Pending',
            'prescribed_by' => '4',
            'issued_by' => NULL,
        ],
        [
            'visit_id' => '6',
            'medicine_code' => 'MED001',
            'strength' => '60 gms',
            'dose' => '1x2',
            'quantity' => '10',
            'amount' => '100',
            'issuance' => 'Pending',
            'prescribed_by' => '4',
            'issued_by' => NULL,
        ],
        [
            'visit_id' => '6',
            'medicine_code' => 'MED008',
            'strength' => '20 gms',
            'dose' => '2x1',
            'quantity' => '1',
            'amount' => '550',
            'issuance' => 'Pending',
            'prescribed_by' => '4',
            'issued_by' => NULL,
        ],
    ];

    public function run()
    {
        foreach($this->prescriptions as $index => $prescription){
            $result = Prescription::create($prescription);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            }
        }

        $this->command->info("Inserted ".count($this->prescriptions)." records.");
    }
}
