<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySubject extends Model
{
    use HasFactory;
    protected $table = 'category_subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'category_subject_name', 'category_subject_note', 'symbol'];

    //Loại học phần có nhiều chương trình học
    public function ProgramStudy()
    {
        return $this->hasMany('App\Models\ProgramStudy');
    }
}
