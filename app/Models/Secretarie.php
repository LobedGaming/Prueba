<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretarie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
