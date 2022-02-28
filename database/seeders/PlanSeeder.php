<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("plans")->insert([
            "name" => "Fale Mais 30",
            "minutes" => 30,
            "description" => "Você só paga as ligações que passarem de 30 minutos"
        ]);
        DB::table("plans")->insert([
            "name" => "Fale Mais 60",
            "minutes" => 60,
            "description" => "Você só paga as ligações que passarem de 60 minutos"
        ]);
        DB::table("plans")->insert([
            "name" => "Fale Mais 120",
            "minutes" => 120,
            "description" => "Você só paga as ligações que passarem de 120 minutos"
        ]);
    }
}
