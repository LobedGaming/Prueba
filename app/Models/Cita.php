<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha_hora',
        'description',
        'doctor_id',
        'patient_id',
        'secretarie_id',];
    protected $primaryKey = 'id';

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function secretario(){
        return $this->belongsTo(Secretarie::class,'secretarie_id');
    }

    public function paciente(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
