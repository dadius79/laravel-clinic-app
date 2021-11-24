<?php

namespace Database\Seeders;

use App\Models\OptionMenu;
use Illuminate\Database\Seeder;

class OptionMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $optionmenus = [
        [
            'sub_menu_id' => '11',
            'name' => 'Active Rooms',
            'slug' => 'active-rooms',
            'url' => 'active-rooms',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '11',
            'name' => 'Inactive Rooms',
            'slug' => 'inactive-rooms',
            'url' => 'inactive-rooms',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '12',
            'name' => 'In stock',
            'slug' => 'in-stock',
            'url' => 'in-stock',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '12',
            'name' => 'Out of Stock',
            'slug' => 'out-of-stock',
            'url' => 'out-of-stock',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '13',
            'name' => 'Active Departments',
            'slug' => 'active-departments',
            'url' => 'active-departments',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '13',
            'name' => 'Inactive Departments',
            'slug' => 'inactive-departments',
            'url' => 'inactive-departments',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '14',
            'name' => 'Active Menus',
            'slug' => 'active-menus',
            'url' => 'active-menus',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '14',
            'name' => 'Inactive Menus',
            'slug' => 'inactive-menus',
            'url' => 'inactive-menus',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '15',
            'name' => 'Active Sub Menus',
            'slug' => 'active-sub-menus',
            'url' => 'active-sub-menus',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '15',
            'name' => 'Inactive Sub Menus',
            'slug' => 'inactive-sub-menus',
            'url' => 'inactive-sub-menus',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '16',
            'name' => 'Active Option Menus',
            'slug' => 'active-option-menus',
            'url' => 'active-option-menus',
            'active' => '1',
        ],
        [
            'sub_menu_id' => '16',
            'name' => 'Inactive Option Menus',
            'slug' => 'inactive-option-menus',
            'url' => 'inactive-option-menus',
            'active' => '1',
        ],
    ];

    public function run()
    {
        foreach($this->optionmenus as $index => $optionmenu){
            $result = OptionMenu::create($optionmenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info('Inserted '.count($this->optionmenus).' records');
    }
}
