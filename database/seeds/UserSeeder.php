<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('00000000')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'password'  =>Hash::make('00000000')
        ]);

        $admin->assignRole('user');
    }
}
