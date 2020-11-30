<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $table = 'titles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'title_name','title_description'];

    //Chức danh có nhiều giảng viên
    public function Teacher()
    {
        return $this->hasMany('App\Models\Teacher');
    }
}
