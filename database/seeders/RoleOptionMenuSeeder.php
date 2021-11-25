<?php

namespace Database\Seeders;

use App\Models\RoleOptionMenu;
use Illuminate\Database\Seeder;

class RoleOptionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $roleoptionmenus = [
        [
            'role_id' => '1',
            'option_menu_id' => '1',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '2',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '3',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '4',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '5',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '6',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '7',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '8',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '9',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '10',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '11',
        ],
        [
            'role_id' => '1',
            'option_menu_id' => '12',
        ],
        [
            'role_id' => '4',
            'option_menu_id' => '3',
        ],
        [
            'role_id' => '4',
            'option_menu_id' => '4',
        ],
    ];

    public function run()
    {
        foreach($this->roleoptionmenus as $index => $roleoptionmenu) {
            $result = RoleOptionMenu::create($roleoptionmenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->roleoptionmenus)." records");
    }
}
