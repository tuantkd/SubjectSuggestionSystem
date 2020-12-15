<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model
{
    use HasFactory;
    protected $table = 'program_studies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'category_subject_id', 'subject_id', 'program_train_id', 'program_studie_note'];

    //Chương trình học thuộc loại học phần
    public function CategorySubject()
    {
        return $this->belongsTo('App\Models\CategorySubject');
    }

    //Chương trình học thuộc học phần
    public function Subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    //Chương trình học thuộc chương trình đào tạo
    public function ProgramTrain()
    {
        return $this->belongsTo('App\Models\ProgramTrain');
    }
}
