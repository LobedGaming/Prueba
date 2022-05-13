<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha_hora',
        'doctor_id',
        'description',
        'patient_id',
        'secretarie_id',];
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
