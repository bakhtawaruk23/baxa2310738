<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    //relation with Student Address 1-to-1
    public function studentAddress()
    {
        return $this->hasOne(StudentAddress::class);
    }

    //belongs to many -> many to many
    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'student_subjects', 'student_id', 'subject_id');
    }

    // one to many relationship
    public function studentAbsent(){
        return $this->hasMany(StudentAbsent::class);
    }
}
