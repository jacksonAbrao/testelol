<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tariffs')->insert([
            'area_code_origin' => 11,
            'area_code_destination' => 16,
            'tariff' => 1.90
        ]);
        DB::table('tariffs')->insert([
            'area_code_origin' => 11,
            'area_code_destination' => 17,
            'tariff' => 1.70
        ]);
        DB::table('tariffs')->insert([
            'area_code_origin' => 11,
            'area_code_destination' => 18,
            'tariff' => 0.90
        ]);
        DB::table('tariffs')->insert([
            'area_code_origin' => 16,
            'area_code_destination' => 11,
            'tariff' => 2.90
        ]);
        DB::table('tariffs')->insert([
            'area_code_origin' => 17,
            'area_code_destination' => 11,
            'tariff' => 2.70
        ]);
        DB::table('tariffs')->insert([
            'area_code_origin' => 18,
            'area_code_destination' => 11,
            'tariff' => 1.90
        ]);

    }
}
