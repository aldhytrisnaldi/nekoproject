<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
