<?php

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //many to many
    $student = App\Models\Student::with('subject')->withCount('subject')->get();

    //many to many
    $subject = Subject::with('student')
        ->withCount('student')
        ->get();

    //one to one
    $studentwithaddress = Student::with('studentAddress')
        ->get();

    //one to many
    $studentAbsent = Student::with('studentAbsent')
        ->withCount('studentAbsent')
        ->get();

    return DB::table('students')
        ->join('student_addresses', 'student_addresses.student_id', 'students.id')
        ->select('students.name', 'student_addresses.city_name')
        ->get();

    // return $studentAbsent;
    // return $studentwithaddress;
    //return $subject;
    return $student;

});
