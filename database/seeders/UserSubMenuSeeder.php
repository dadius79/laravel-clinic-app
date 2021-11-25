<?php

namespace Database\Seeders;

use App\Models\UserSubMenu;
use Illuminate\Database\Seeder;

class UserSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $usersubmenus = [
        [
            'admin_id' => '1',
            'sub_menu_id' => '1',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '2',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '3',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '4',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '5',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '6',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '7',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '8',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '9',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '10',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '11',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '12',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '13',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '14',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '15',
        ],
        [
            'admin_id' => '1',
            'sub_menu_id' => '16',
        ],
        [
            'admin_id' => '2',
            'sub_menu_id' => '1',
        ],
        [
            'admin_id' => '2',
            'sub_menu_id' => '2',
        ],
        [
            'admin_id' => '3',
            'sub_menu_id' => '3',
        ],
        [
            'admin_id' => '3',
            'sub_menu_id' => '4',
        ],
        [
            'admin_id' => '4',
            'sub_menu_id' => '5',
        ],
        [
            'admin_id' => '4',
            'sub_menu_id' => '6',
        ],
        [
            'admin_id' => '4',
            'sub_menu_id' => '12',
        ],
        [
            'admin_id' => '5',
            'sub_menu_id' => '7',
        ],
        [
            'admin_id' => '5',
            'sub_menu_id' => '8',
        ],
    ];

    public function run()
    {
        foreach($this->usersubmenus as $index => $usersubmenu){
            $result = UserSubMenu::create($usersubmenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->usersubmenus)." records");
    }
}
