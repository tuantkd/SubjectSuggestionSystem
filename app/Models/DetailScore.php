<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailScore extends Model
{
    use HasFactory;
    protected $table = 'detail_scores';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable =
        [
            'id', 'class_subject_id','student_id','score_char','score_number','score_ladder_four'
        ];

    //Chi tiết điểm thuộc sinh viên
    public function Student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    //Chi tiết điểm thuộc lớp học phần
    public function ClassSubject()
    {
        return $this->belongsTo('App\Models\ClassSubject');
    }
}
