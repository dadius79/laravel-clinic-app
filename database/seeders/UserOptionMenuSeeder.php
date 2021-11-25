<?php

namespace Database\Seeders;

use App\Models\UserOptionMenu;
use Illuminate\Database\Seeder;

class UserOptionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $useroptionmenus = [
        [
            'admin_id' => '1',
            'option_menu_id' => '1',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '2',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '3',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '4',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '5',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '6',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '7',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '8',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '9',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '10',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '11',
        ],
        [
            'admin_id' => '1',
            'option_menu_id' => '12',
        ],
        [
            'admin_id' => '4',
            'option_menu_id' => '3',
        ],
        [
            'admin_id' => '4',
            'option_menu_id' => '4',
        ],
    ];

    public function run()
    {
        foreach($this->useroptionmenus as $index => $useroptionmenu) {
            $result = UserOptionMenu::create($useroptionmenu);

            if(!$result){
                $this->command->info("Insert failed at record $index");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->useroptionmenus)." records");
    }
}
