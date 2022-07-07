<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Properties;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            Properties::create([
                'properties_name' => '物件No' . $i,
                'address' => '大阪府大阪市淀川区西中島' . $i . '丁目' . $i . '番地' . $i,
                'building_age' => '築' . $i . '0年',
                'rent' => '賃貸',
            ]);
        }
    }
}
