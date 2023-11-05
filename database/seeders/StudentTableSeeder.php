<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentAbsent;
use App\Models\StudentAddress;
use App\Models\Subject;
use Database\Factories\SubjectFactory;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()->count(30)
            ->has(StudentAddress::factory())
            ->has(StudentAbsent::factory()->count(3), 'studentAbsent')
            ->create();
    }
}
