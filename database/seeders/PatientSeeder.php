<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $patients = [
        [
            'name' => 'Johnson Hemsworth',
            'date_of_birth' => '1995-02-03',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '78965412',
            'address' => 'Kajiado',
            'phone_number' => '7896541230',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Narco Rodriguez',
            'date_of_birth' => '1975-07-21',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '54448500',
            'address' => 'Nakuru',
            'phone_number' => '9754448500',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Tom Miller',
            'date_of_birth' => '1988-07-10',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '12578888',
            'address' => 'Mombasa',
            'phone_number' => '1257888880',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Terri Silva',
            'date_of_birth' => '1999-03-03',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '94561320',
            'address' => 'Narok',
            'phone_number' => '7894561320',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Jeff Montano',
            'date_of_birth' => '1991-12-01',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '13785545',
            'address' => 'Kiambu',
            'phone_number' => '1378554540',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Andy Thompson',
            'date_of_birth' => '1975-04-05',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '10000069',
            'address' => 'Nairobi',
            'phone_number' => '5210000069',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Sophie Turner',
            'date_of_birth' => '1964-02-13',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '69696969',
            'address' => 'Kisii',
            'phone_number' => '6969696969',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Annie Franklin',
            'date_of_birth' => '1993-04-23',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '78881000',
            'address' => 'Kirinyaga',
            'phone_number' => '2478881000',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'Rosa Miers',
            'date_of_birth' => '1996-07-22',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '65455522',
            'address' => 'Marsabit',
            'phone_number' => '6545552220',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
        [
            'name' => 'John Stuart',
            'date_of_birth' => '1975-03-02',
            'sex' => 'Male',
            'national_status' => 'Citizen',
            'national_id' => '94561250',
            'address' => 'Kitui',
            'phone_number' => '7894561250',
            'emergency_number' => NULL,
            'registered_by' => '2'
        ],
    ];

    public function run()
    {
        foreach($this->patients as $index => $patient) {

            $result = Patient::create($patient);

            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->patients)." records.");
    }
}
