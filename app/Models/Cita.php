<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function secretario(){
        return $this->belongsTo(Secretarie::class);
    }

    public function paciente(){
        return $this->belongsTo(Patient::class);
    }
}
