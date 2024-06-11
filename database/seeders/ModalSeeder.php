<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('modals')->insert([
            [
                'name'=>'department',
                'slug'=>'department',
                'link'=>'/department',
            ],
            [
                'name'=>'doctor',
                'slug'=>'doctor',
                'link'=>'/doctor',
            ]

        ]);
    }
}
