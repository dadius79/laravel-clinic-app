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
    public function run()
    {
        //
        AdminRoles::create(
            [
                'name' => 'Receptionist',
            ],
            [
                'name' => 'Doctor',
            ],
            [
                'name' => 'Pharmacist',
            ],
            [
                'name' => 'Cashier',
            ],
            [
                'name' => 'Manager'
            ],
        );
    }
}
