<?php

namespace Database\Seeders;

use App\Models\AdminRoles; //EDBYDOS
use Illuminate\Database\Seeder;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $roles = [
        [
            'role' => 'Manager',
        ],
        [
            'role' => 'Receptionist',
        ],
        [
            'role' => 'Doctor',
        ],
        [
            'role' => 'Pharmacist',
        ],
        [
            'role' => 'Cashier',
        ], 
    ];

    public function run()
    {
        foreach($this->roles as $index => $role){

            $result = AdminRoles::create($role);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }

        }

        $this->command->info('Inserted '.count($this->roles).' records');
    }
}
