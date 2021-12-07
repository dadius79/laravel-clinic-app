<?php

namespace Database\Seeders;

use App\Models\UserMenu;
use Illuminate\Database\Seeder;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $usermenus = [
        [
            'admin_id' => '1',
            'menu_id' => '1',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '2',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '3',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '4',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '5',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '6',
        ],
        [
            'admin_id' => '1',
            'menu_id' => '7',
        ],
        [
            'admin_id' => '2',
            'menu_id' => '1',
        ],
        [
            'admin_id' => '2',
            'menu_id' => '2',
        ],
        [
            'admin_id' => '3',
            'menu_id' => '3',
        ],
        [
            'admin_id' => '4',
            'menu_id' => '4',
        ],
        [
            'admin_id' => '4',
            'menu_id' => '7',
        ],
        [
            'admin_id' => '5',
            'menu_id' => '5',
        ],
        [
            'admin_id' => '3',
            'menu_id' => '6',
        ],
    ];

    public function run()
    {
        foreach($this->usermenus as $index => $usermenu){
            $result = UserMenu::create($usermenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->usermenus)." records");
    }
}
