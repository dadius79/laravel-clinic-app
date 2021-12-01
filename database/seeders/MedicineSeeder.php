<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $medicines = [
        [
            'name' => 'PARACETAMOL',
            'code' => 'MED001',
            'type' => 'DRUG',
            'rate_per_unit' => '10.00',
            'quantity' => '1000',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'ALBENDAZOLE',
            'code' => 'MED002',
            'type' => 'DRUG',
            'rate_per_unit' => '15.00',
            'quantity' => '25',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'ADRENALINE',
            'code' => 'MED003',
            'type' => 'INJECTION',
            'rate_per_unit' => '500.00',
            'quantity' => '100',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'VENTOLIN INHALER',
            'code' => 'MED004',
            'type' => 'INHALER',
            'rate_per_unit' => '1000',
            'quantity' => '20',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'AMOXICILIN',
            'code' => 'MED005',
            'type' => 'DRUG',
            'rate_per_unit' => '28',
            'quantity' => '67',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'PIRITON',
            'code' => 'MED006',
            'type' => 'DRUG',
            'rate_per_unit' => '10',
            'quantity' => '50',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'BACTOCLAV',
            'code' => 'MED007',
            'type' => 'DRUG',
            'rate_per_unit' => '17',
            'quantity' => '75',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'INSULIN',
            'code' => 'MED008',
            'type' => 'INJECTION',
            'rate_per_unit' => '550',
            'quantity' => '20',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'CLAVULIN',
            'code' => 'MED009',
            'type' => 'DRUG',
            'rate_per_unit' => '87',
            'quantity' => '80',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
        [
            'name' => 'CREMANINE',
            'code' => 'MED010',
            'type' => 'OINTMENT',
            'rate_per_unit' => '73',
            'quantity' => '67',
            'in_stock' => '1',
            'expiry_date' => '2022-12-31',
        ],
    ];
    
    public function run()
    {
        foreach($this->medicines as $index => $medicine){
            $result = Medicine::create($medicine);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->medicines).' records');
    }
}
