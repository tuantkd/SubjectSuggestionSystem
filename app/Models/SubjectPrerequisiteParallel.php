<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectPrerequisiteParallel extends Model
{
    use HasFactory;
    protected $table = 'subject_prerequisite_parallels';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable =['id', 'subject_id', 'prerequisite_parallel_id'];

    //Học phần tiên quyết hoặc song hành thuộc tiên quyết hoặc song hành
    public function PrerequisiteParallel()
    {
        return $this->belongsTo('App\Models\PrerequisiteParallel');
    }

    //Học phần tiên quyết hoặc song hành thuộc học phần
    public function Subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
