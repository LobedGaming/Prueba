<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function admins(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function cita(){
        return $this->hasMany(Cita::class);
    }
}


