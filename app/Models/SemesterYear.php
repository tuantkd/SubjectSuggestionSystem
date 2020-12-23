<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterYear extends Model
{
    use HasFactory;
    protected $table = 'semester_years';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'semester_year', 'semesteryear', 'date_begin', 'date_end'];

    //Học kỳ có nhiều lớp học phần
    public function ClassSubject()
    {
        return $this->hasMany('App\Models\ClassSubject');
    }
}
