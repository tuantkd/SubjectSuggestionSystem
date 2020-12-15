<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrerequisiteParallel extends Model
{
    use HasFactory;
    protected $table = 'prerequisite_parallels';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable =['id', 'prerequisite_parallel_note', 'subject_code'];

    //Tiên quyết hoặc song hành có nhiều trong học phần tiên quyết hoặc song hành
    public function SubjectPrerequisiteParallel()
    {
        return $this->hasMany('App\Models\PrerequisiteParallel');
    }
}
