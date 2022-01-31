<?php

use App\Divisions;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        Divisions::create([
            'division_name'     => 'IT SOFTWARE',
            'departement_id'    => '1',
            'status'            => '1'
        ]);

        Divisions::create([
            'division_name'     => 'IT ENGINEER',
            'departement_id'    => '1',
            'status'            => '1'
        ]);

        Divisions::create([
            'division_name'     => 'IT SUPPORT',
            'departement_id'    => '1',
            'status'            => '1'
        ]);

        Divisions::create([
            'division_name'     => 'SYSADMIN',
            'departement_id'    => '1',
            'status'            => '1'
        ]);
    }
}
