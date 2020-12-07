<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'majors';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'part_subject_id','major_name','major_note'];

    //Chuyên ngành thuộc Bộ môn
    public function PartSubject()
    {
        return $this->belongsTo('App\Models\PartSubject');
    }

    //Chuyên ngành có nhiều lớp chuyên ngành
    public function ClassMajor()
    {
        return $this->hasMany('App\Models\ClassMajor');
    }

    //Chuyên ngành có nhiều chương trình đào tạo
    public function ProgramTrain()
    {
        return $this->hasMany('App\Models\ProgramTrain');
    }
}
