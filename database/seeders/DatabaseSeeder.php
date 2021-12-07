<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminRolesSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SubMenuTableSeeder::class);
        $this->call(OptionMenuTableSeeder::class);
        $this->call(RoleMenuSeeder::class);
        $this->call(RoleSubMenuSeeder::class);
        $this->call(RoleOptionMenuSeeder::class);
        $this->call(UserMenuSeeder::class);
        $this->call(UserSubMenuSeeder::class);
        $this->call(UserOptionMenuSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(VisitRateSeeder::class);
        $this->call(ConsultationFeeSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(VisitSeeder::class);
        $this->call(ConsultationSeeder::class);
        $this->call(PrescriptionSeeder::class);
        $this->call(BillingSeeder::class);
    }
}
