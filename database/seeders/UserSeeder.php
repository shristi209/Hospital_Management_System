<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin12345'),
                'role_id'=>1,
            ]
        ]);
    }
}
