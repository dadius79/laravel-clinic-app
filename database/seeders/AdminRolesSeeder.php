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
            /*1*/
            'role' => 'Manager',
        ],
        [
            /*2*/
            'role' => 'Receptionist',
        ],
        [
            /*3*/
            'role' => 'Doctor',
        ],
        [
            /*4*/
            'role' => 'Pharmacist',
        ],
        [
            /*5*/
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
