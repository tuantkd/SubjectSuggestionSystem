<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'course_name','course_note'];

    //Khóa học có nhiều lớp chuyên ngành
    public function ClassMajor()
    {
        return $this->hasMany('App\Models\ClassMajor');
    }

    //Khóa học có nhiều chương trình đào tạo
    public function ProgramTrain()
    {
        return $this->hasMany('App\Models\ProgramTrain');
    }
}
