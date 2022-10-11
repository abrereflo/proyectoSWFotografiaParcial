<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'fecha',
        'hora',
        'precio',
        'estado',
        'code_qr',
        'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function album(){
        return $this->hasOne(Album::class);
    }
}
