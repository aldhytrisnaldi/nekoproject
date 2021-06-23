<?php

use App\Positions;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        Positions::create([
            'position_name'     => 'FRONTEND DEV',
            'division_id'       => '1'
        ]);

        Positions::create([
            'position_name'     => 'BACKEND DEV',
            'division_id'       => '1'
        ]);

        Positions::create([
            'position_name'     => 'DEV OPS',
            'division_id'       => '4'
        ]);

        Positions::create([
            'position_name'     => 'IT STAFF',
            'division_id'       => '3'
        ]);
    }
}
