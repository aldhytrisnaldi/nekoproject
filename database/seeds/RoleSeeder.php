<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name'          => 'admin',
            'guard_name'    => 'api'
        ]);

        Role::create([
            'name'          => 'user',
            'guard_name'    => 'api'
        ]);
    }
}
