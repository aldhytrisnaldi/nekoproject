<?php

use App\Divisions;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        Divisions::create([
            'division_name' =>  'IT SOFTWARE'
        ]);

        Divisions::create([
            'division_name' =>  'IT ENGINEER'
        ]);

        Divisions::create([
            'division_name' =>  'IT SUPPORT'
        ]);

        Divisions::create([
            'division_name' =>  'SYSADMIN'
        ]);
    }
}
