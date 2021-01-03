<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectStudentStudy extends Model
{
    use HasFactory;
    protected $table = 'subject_student_studies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'class_subject_id','subject_code', 'subject_name'];
}
