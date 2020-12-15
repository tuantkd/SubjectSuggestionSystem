<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;
    protected $table = 'class_subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable =
        [
            'id', 'teacher_id','semester_year_id','subject_id','class_subject_code',
            'class_subject_name', 'class_subject_note'
        ];

    //Lớp học phần thuộc Giảng viên
    public function Teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    //Lớp học phần thuộc Học kỳ Năm học
    public function SemesterYear()
    {
        return $this->belongsTo('App\Models\SemesterYear');
    }

    //Lớp học phần thuộc Môn học
    public function Subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    //Lớp học phần có nhiều chi tiết điểm
    public function DetailScore()
    {
        return $this->hasMany('App\Models\DetailScore');
    }
}
