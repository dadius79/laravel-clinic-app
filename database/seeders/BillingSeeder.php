<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billing;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $billings = [
        [
            'visit_id' => '1',
            'paid' => '1800.00',
            'balance' => '0.00',
            'served_by' => '5',
            'status' => 'Completed',
        ],
        [
            'visit_id' => '4',
            'paid' => '2000.00',
            'balance' => '0.00',
            'served_by' => '5',
            'status' => 'Completed',
        ],
    ];

    public function run()
    {
        foreach($this->billings as $index => $billing){
            $result = Billing::create($billing);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            }
        }

        $this->command->info("Inserted ".count($this->billings)." records.");
    }
}
