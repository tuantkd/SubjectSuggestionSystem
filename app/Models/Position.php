<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'position_name','position_description'];

    //Chức vụ có một quyền duy nhất
    public function Role()
    {
        return $this->hasOne('App\Models\Role');
    }

    //Chức vụ có nhiều giảng viên
    public function Teacher()
    {
        return $this->hasMany('App\Models\Teacher');
    }
}
