<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartSubject extends Model
{
    use HasFactory;
    protected $table = 'part_subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'department_id','part_subject_name','part_subject_description'];

    //Bộ môn thuộc Khoa
    public function Department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    //Bộ môn có nhiều giảng viên
    public function Teacher()
    {
        return $this->hasMany('App\Models\Teacher');
    }

    //Bộ môn có nhiều Chuyên ngành
    public function Major()
    {
        return $this->hasMany('App\Models\Major');
    }
}
