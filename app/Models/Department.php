<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id','department_name','department_description'];

    //Khoa có nhiều bộ môn
    public function PartSubject()
    {
        return $this->hasOne('App\Models\PartSubject');
    }
}
