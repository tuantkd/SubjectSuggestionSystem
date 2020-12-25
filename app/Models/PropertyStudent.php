<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStudent extends Model
{
    use HasFactory;
    protected $table = 'property_students';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['student_code','subject_code','semester_year'];
}
