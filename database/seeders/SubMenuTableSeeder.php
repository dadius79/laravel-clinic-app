<?php

namespace Database\Seeders;

use App\Models\SubMenu; //EDBYDOS
use Illuminate\Database\Seeder;

class SubMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $submenus = [
        [
            'menu_id' => '2', /*1*/
            'name' => 'Pending Visits',
            'slug' => 'pending-visits',
            'url' => 'pending-visits',
            'active' => '1',
        ],
        [
            'menu_id' => '2', /*2*/
            'name' => 'Completed Visits',
            'slug' => 'completed-visits',
            'url' => 'completed-visits',
            'active' => '1',
        ],
        [
            'menu_id' => '3', /*3*/
            'name' => 'Pending Consultations',
            'slug' => 'pending-consultations',
            'url' => 'pending-consultations',
            'active' => '1',
        ],
        [
            'menu_id' => '3', /*4*/
            'name' => 'Completed Consultations',
            'slug' => 'completed-consultations',
            'url' => 'completed-consultations',
            'active' => '1',
        ],
        [
            'menu_id' => '4', /*5*/
            'name' => 'Pending Issuances',
            'slug' => 'pending-issuances',
            'url' => 'pending-issuances',
            'active' => '1',
        ],
        [
            'menu_id' => '4', /*6*/
            'name' => 'Completed Issuances',
            'slug' => 'completed-issuances',
            'url' => 'completed-issuances',
            'active' => '1',
        ],
        [
            'menu_id' => '5', /*7*/
            'name' => 'Pending Payments',
            'slug' => 'pending-payments',
            'url' => 'pending-payments',
            'active' => '1',
        ],
        [
            'menu_id' => '5', /*8*/
            'name' => 'Completed Payments',
            'slug' => 'completed-payments',
            'url' => 'completed-payments',
            'active' => '1',
        ],
        [
            'menu_id' => '6', /*9*/
            'name' => 'Active Admin',
            'slug' => 'active-admin',
            'url' => 'active-admin',
            'active' => '1',
        ],
        [
            'menu_id' => '6', /*10*/
            'name' => 'Inactive Admin',
            'slug' => 'inactive-admin',
            'url' => 'inactive-admin',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*11*/
            'name' => 'Rooms',
            'slug' => 'rooms',
            'url' => 'rooms',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*12*/
            'name' => 'Medicine',
            'slug' => 'medicine',
            'url' => 'medicine',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*13*/
            'name' => 'Departments',
            'slug' => 'departments',
            'url' => 'departments',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*14*/
            'name' => 'Menu',
            'slug' => 'menu',
            'url' => 'menu',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*15*/
            'name' => 'Sub Menu',
            'slug' => 'sub-menu',
            'url' => 'sub-menu',
            'active' => '1',
        ],
        [
            'menu_id' => '7', /*16*/
            'name' => 'Option Menu',
            'slug' => 'option-menu',
            'url' => 'option-menu',
            'active' => '1',
        ],
    ];

    public function run()
    {
        foreach($this->submenus as $index => $submenu){
            $result = SubMenu::create($submenu);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }

        $this->command->info('Inserted '.count($this->submenus).' records');
    }
}
