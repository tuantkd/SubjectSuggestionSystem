<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id', 'subject_code', 'subject_name', 'subject_number_credit',
        'subject_status', 'subject_number_theory','subject_number_practice'
    ];

    //Học phần có nhiều lớp học phần
    public function ClassSubject()
    {
        return $this->hasMany('App\Models\ClassSubject');
    }

    //Học phần có nhiều chương trình học
    public function ProgramStudy()
    {
        return $this->hasMany('App\Models\ProgramStudy');
    }

    //Học phần có nhiều trong học phần tiên quyết hoặc song hành
    public function SubjectPrerequisiteParallel()
    {
        return $this->hasMany('App\Models\PrerequisiteParallel');
    }
}
