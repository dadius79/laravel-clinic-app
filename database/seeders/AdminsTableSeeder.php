<?php

namespace Database\Seeders;

use App\Models\Admin; //EDBYDOS
use Illuminate\Database\Seeder;
//EDBYDOS
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $admins = [
        [
            /*1*/
            'name' => 'John Courage Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@admin.com',
            'date_of_birth' => '1999-01-01',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '11223344',
            'address' => 'Nairobi',
            'phone_number' => '0711223344',
            'emergency_number' => NULL,
            'profession_id' => NULL,
            'profession_certificate_number' => NULL,
            'admin_role' => '1',
            'active' => '1',
            'password' => 'password',
        ],
        [
            /*2*/
            'name' => 'Lewis Hamilton',
            'username' => 'lewishamilton',
            'email' => 'lewishamilton@admin.com',
            'date_of_birth' => '1981-02-03',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '45648434',
            'address' => 'Nakuru',
            'phone_number' => '0721567783',
            'emergency_number' => NULL,
            'profession_id' => NULL,
            'profession_certificate_number' => NULL,
            'admin_role' => '2',
            'active' => '1',
            'password' => 'password',
        ],
        [
            /*3*/
            'name' => 'Serena Williams',
            'username' => 'serenawilliams',
            'email' => 'serenawilliams@admin.com',
            'date_of_birth' => '1975-06-06',
            'sex' => 'Female',
            'national_status' => 'Citizen',
            'national_id' => '19560233',
            'address' => 'Kajiado',
            'phone_number' => '0712983321',
            'emergency_number' => NULL,
            'profession_id' => NULL,
            'profession_certificate_number' => NULL,
            'admin_role' => '3',
            'active' => '1',
            'password' => 'password',
        ],
        [
            /*4*/
            'name' => 'Barack Obama',
            'username' => 'barackobama',
            'email' => 'barackobama@admin.com',
            'date_of_birth' => '1991-08-02',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '98126622',
            'address' => 'Kiambu',
            'phone_number' => '0734661983',
            'emergency_number' => NULL,
            'profession_id' => NULL,
            'profession_certificate_number' => NULL,
            'admin_role' => '4',
            'active' => '1',
            'password' => 'password',
        ],
        [
            /*5*/
            'name' => 'Maya Angelou',
            'username' => 'mayaangelou',
            'email' => 'mayaangelou@admin.com',
            'date_of_birth' => '1966-01-03',
            'sex' => 'Female',
            'national_status' => 'Citizen',
            'national_id' => '67991105',
            'address' => 'Machakos',
            'phone_number' => '0789716022',
            'emergency_number' => NULL,
            'profession_id' => NULL,
            'profession_certificate_number' => NULL,
            'admin_role' => '5',
            'active' => '1',
            'password' => 'password',
        ],
    ];

    public function run()
    {
        foreach($this->admins as $index => $admin){
            $admin['password'] = bcrypt($admin['password']);

            $result = Admin::create($admin);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
            }
        }

        $this->command->info("Inserted ".count($this->admins)." records");
    }
}
