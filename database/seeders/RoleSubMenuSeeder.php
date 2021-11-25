<?php

namespace Database\Seeders;

use App\Models\RoleSubMenu;
use Illuminate\Database\Seeder;

class RoleSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $rolesubmenus = [
        [
            'role_id' => '1',
            'sub_menu_id' => '1',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '2',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '3',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '4',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '5',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '6',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '7',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '8',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '9',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '10',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '11',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '12',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '13',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '14',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '15',
        ],
        [
            'role_id' => '1',
            'sub_menu_id' => '16',
        ],
        [
            'role_id' => '2',
            'sub_menu_id' => '1',
        ],
        [
            'role_id' => '2',
            'sub_menu_id' => '2',
        ],
        [
            'role_id' => '3',
            'sub_menu_id' => '3',
        ],
        [
            'role_id' => '3',
            'sub_menu_id' => '4',
        ],
        [
            'role_id' => '4',
            'sub_menu_id' => '5',
        ],
        [
            'role_id' => '4',
            'sub_menu_id' => '6',
        ],
        [
            'role_id' => '4',
            'sub_menu_id' => '12',
        ],
        [
            'role_id' => '5',
            'sub_menu_id' => '7',
        ],
        [
            'role_id' => '5',
            'sub_menu_id' => '8',
        ],
    ];

    public function run()
    {
        foreach($this->rolesubmenus as $index => $rolesubmenu){
            $result = RoleSubMenu::create($rolesubmenu);

            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->rolesubmenus)." records");
    }
}
