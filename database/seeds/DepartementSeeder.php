<?php

use App\Departements;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    public function run()
    {
        Departements::create([
            'departement_name'  =>  'INFORMATION TECHNOLOGY',
            'status'            =>  '1'
        ]);

        Departements::create([
            'departement_name'  =>  'FINANCE',
            'status'            =>  '1'
        ]);

        Departements::create([
            'departement_name'  =>  'HUMAN RESOURCES',
            'status'            =>  '1'
        ]);

        Departements::create([
            'departement_name'  =>  'MARKETING',
            'status'            =>  '1'
        ]);

        Departements::create([
            'departement_name'  =>  'CASHIER',
            'status'            =>  '1'
        ]);

        Departements::create([
            'departement_name'  =>  'PHARMACY',
            'status'            =>  '1'
        ]);
    }
}
