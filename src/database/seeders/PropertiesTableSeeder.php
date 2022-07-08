<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset
        DB::table('properties')->delete();

        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 10; $i++) {
            \App\Properties::create([
                'propertiesName' => $faker->propertiesName(),
                'adress' => $faker->adress(),
                'buildingAge' => $faker->buildingAge(),
                'rent' => $faker->rent(),
            ]);
        }
    }
}
