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

    protected $fillable = ['id', 'subject_code', 'subject_name', 'subject_number_credit','subject_status'];

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
}
