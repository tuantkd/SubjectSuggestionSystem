<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable =
    [
        'id', 'part_subject_id','title_id','degree_id','position_id',
        'fullname', 'birthday','sex','phone','email','address','avatar'
    ];

    //Giảng viên thuộc chức vụ
    public function Position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    //Giảng viên thuộc chức danh
    public function Title()
    {
        return $this->belongsTo('App\Models\Title');
    }

    //Giảng viên thuộc Bộ môn
    public function PartSubject()
    {
        return $this->belongsTo('App\Models\PartSubject');
    }

    //Giảng viên thuộc Học vị
    public function Degree()
    {
        return $this->belongsTo('App\Models\Degree');
    }

    //Giảng viên có nhiều lớp học phần
    public function ClassSubject()
    {
        return $this->hasMany('App\Models\ClassSubject');
    }
}
