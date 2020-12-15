<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id', 'class_major_id', 'student_code', 'student_fullname', 'student_birthday', 'student_sex',
        'student_phone', 'student_email', 'student_address', 'student_avatar'
    ];

    //Sinh viên thuộc Lớp Chuyên ngành
    public function ClassMajor()
    {
        return $this->belongsTo('App\Models\ClassMajor');
    }

    //Sinh viên có nhiều chi tiết điểm
    public function DetailScore()
    {
        return $this->hasMany('App\Models\DetailScore');
    }
}
