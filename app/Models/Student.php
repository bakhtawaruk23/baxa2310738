<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function studentAddress()
    {
        return $this->hasOne(StudentAddress::class);
    }

    //belongs to many - table subject dagare har student 
    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'student_subjects', 'student_id', 'subject_id');
    }

    public function studentAbsent(){
        return $this->hasMany(StudentAbsent::class);
    }
}
