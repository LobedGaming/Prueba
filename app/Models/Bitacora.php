<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Bitacora extends Model
{
    use HasFactory, EncryptedAttribute;

    protected $table = 'bitacoras';
    
    protected $encryptable = [
        'implicado',
        'nombre_usuario'
    ];
    public $timestamps = false;

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }
}
