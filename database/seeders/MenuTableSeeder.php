<?php

namespace Database\Seeders;

use App\Models\Menu; //EDBYDOS
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $menus = [
        [
            /*1*/
            'name' => 'Patients',
            'slug' => 'patients',
            'url' => 'patients',
            'active' => '1',
        ],
        [
            /*2*/
            'name' => 'Visits',
            'slug' => 'visits',
            'url' => 'visits',
            'active' => '1',
        ],
        [
            /*3*/
            'name' => 'Consultations',
            'slug' => 'consultations',
            'url' => 'consultations',
            'active' => '1',
        ],
        [
            /*4*/
            'name' => 'Pharmacy',
            'slug' => 'pharmacy',
            'url' => 'pharmacy',
            'active' => '1',
        ],
        [
            /*5*/
            'name' => 'Cashier',
            'slug' => 'cashier',
            'url' => 'cashier',
            'active' => '1',
        ],
        [
            /*6*/
            'name' => 'Admin',
            'slug' => 'admin',
            'url' => 'admin',
            'active' => '1',
        ],
        [
            /*7*/
            'name' => 'Masters',
            'slug' => 'masters',
            'url' => 'masters',
            'active' => '1',
        ],
    ];

    
    public function run()
    {
        foreach($this->menus as $index => $menu){
            $result = Menu::create($menu);
            if(!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info('Inserted '.count($this->menus).' records');
    }
}
