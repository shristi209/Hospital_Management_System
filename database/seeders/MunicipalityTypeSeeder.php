<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MunicipalityTypeSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('municipality_types')->insert([
            ['municipality_name'=>'महानगरपालिका'],
            ['municipality_name'=>'उपमहानगरपालिका'],
            ['municipality_name'=>'नगरपालिका'],
            ['municipality_name'=>'गाउँपालिका'],
    ]); 
}
}
