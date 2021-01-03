<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMajor extends Model
{
    use HasFactory;
    protected $table = 'class_majors';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'major_id', 'course_id', 'class_major_code', 'class_major_name', 'class_major_total_number'];

    //Lớp Chuyên ngành thuộc Chuyên ngành
    public function Major()
    {
        return $this->belongsTo('App\Models\Major');
    }

    //Lớp Chuyên ngành thuộc Khóa học
    public function Course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    //Lớp Chuyên ngành có nhiều Sinh viên
    public function Student()
    {
        return $this->hasMany('App\Models\Student');
    }
}
