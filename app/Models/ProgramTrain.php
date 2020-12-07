<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTrain extends Model
{
    use HasFactory;
    protected $table = 'program_trains';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'major_id', 'course_id', 'program_train_name', 'program_train_date_begin'];

    //Chương trình đào tạo thuộc Khóa học
    public function Course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    //Chương trình đào tạo thuộc Chuyên ngành
    public function Major()
    {
        return $this->belongsTo('App\Models\Major');
    }

    //Chương trình đào tạo có nhiều chương trình học
    public function ProgramStudy()
    {
        return $this->hasMany('App\Models\ProgramStudy');
    }
}
