<?php

namespace Database\Seeders;

use App\Models\RoleMenu;
use Illuminate\Database\Seeder;

class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $rolemenus = [
        [
            'role_id' => '1',
            'menu_id' => '1',
        ],
        [
            'role_id' => '1',
            'menu_id' => '2',
        ],
        [
            'role_id' => '1',
            'menu_id' => '3',
        ],
        [
            'role_id' => '1',
            'menu_id' => '4',
        ],
        [
            'role_id' => '1',
            'menu_id' => '5',
        ],
        [
            'role_id' => '1',
            'menu_id' => '6',
        ],
        [
            'role_id' => '1',
            'menu_id' => '7',
        ],
        [
            'role_id' => '2',
            'menu_id' => '1',
        ],
        [
            'role_id' => '2',
            'menu_id' => '2',
        ],
        [
            'role_id' => '3',
            'menu_id' => '3',
        ],
        [
            'role_id' => '4',
            'menu_id' => '4',
        ],
        [
            'role_id' => '4',
            'menu_id' => '7',
        ],
        [
            'role_id' => '5',
            'menu_id' => '5',
        ],
    ];

    public function run()
    {
        foreach($this->rolemenus as $index => $rolemenu){
            $result = RoleMenu::create($rolemenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info("Inserted ".count($this->rolemenus)." records");
    }
}
