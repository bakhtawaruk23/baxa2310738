<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StudentTableSeeder::class);
        $this->call(SubjectTableSeeder::class);

        $students = Student::all();
        $subjects = Subject::all();

        $students->each(function ($student) use ($subjects) {
            $student->subject()->attach(
                $subjects->random(rand(1, 8))->pluck('id')->toArray()
            );
        });
    }
}
