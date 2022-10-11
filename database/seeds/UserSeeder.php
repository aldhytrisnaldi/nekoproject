<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name'      => 'root',
            'email'     => 'root@smarthris.com',
            'password'  => Hash::make('0'),
            'status'    => '1'
        ]);

        $admin = User::create([
            'name'      => 'Superadmin',
            'email'     => 'superadmin@smarthris.com',
            'password'  => Hash::make('0'),
            'status'    => '1'
        ]);

        $admin->assignRole('superadmin');

        $admin = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@smarthris.com',
            'password'  => Hash::make('0'),
            'status'    => '1'
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name'      => 'User',
            'email'     => 'user@smarthris.com',
            'password'  => Hash::make('0'),
            'status'    => '1'
        ]);

        $admin->assignRole('user');
    }
}
