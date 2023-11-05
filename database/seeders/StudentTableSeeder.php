<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentAddress;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()->count(30)->has(StudentAddress::factory())->create();
    }
}
