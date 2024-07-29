<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('parameters')->insert([
            ['title' => 'Parameter 1', 'type' => 1],
            ['title' => 'Parameter 2', 'type' => 2],
            ['title' => 'Parameter 3', 'type' => 2],
        ]);
    }
}
