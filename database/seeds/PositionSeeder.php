<?php

use App\Positions;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        Positions::create([
            'position_name' =>  'FRONTEND DEV'
        ]);

        Positions::create([
            'position_name' =>  'BACKEND DEV'
        ]);

        Positions::create([
            'position_name' =>  'DEV OPS'
        ]);

        Positions::create([
            'position_name' =>  'IT STAFF'
        ]);
    }
}
