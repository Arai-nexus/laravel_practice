<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'name' => '山' . $i . '　' . '太' . $i,
                'email' => 'test' . $i . '@test.co. jp',
                'tel' => '080-1234-123' . $i,
                'message' => 'これはテスト' . ' ' . $i . ' ' . 'です'
            ]);
        }
    }
}
