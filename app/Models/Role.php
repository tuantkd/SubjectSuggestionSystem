<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'role_name','position_id'];

    //Quyền thuộc một chức vụ
    public function Position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
