<?php

use App\Departements;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    public function run()
    {
        Departements::create([
            'departement_name'  =>  'INFORMATION TECHNOLOGY'
        ]);

        Departements::create([
            'departement_name'  =>  'FINANCE'
        ]);

        Departements::create([
            'departement_name'  =>  'HUMAN RESOURCES'
        ]);

        Departements::create([
            'departement_name'  =>  'MARKETING'
        ]);

        Departements::create([
            'departement_name'  =>  'CASHIER'
        ]);

        Departements::create([
            'departement_name'  =>  'PHARMACY'
        ]);
    }
}
