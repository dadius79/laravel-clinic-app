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
    public function run()
    {
        $faker = Faker::create();

        Admin::create([
            'name' => 'John Courage Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@admin.com',
            'date_of_birth' => '1990-01-01',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '11223344',
            'admin_role' => '1',
            'password' => bcrypt('password'),
        ]);
    }
}
