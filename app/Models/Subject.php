<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_subjects', 'subject_id', 'student_id');
    }
}
