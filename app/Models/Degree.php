<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $table = 'degrees';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'degree_name','degree_description'];

    //Học vị có nhiều giảng viên
    public function Teacher()
    {
        return $this->hasMany('App\Models\Teacher');
    }
}
