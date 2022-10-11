<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = ['persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function orden_compras(){
        return $this->hasMany(OrdenCompra::class);
    }

    public function fotos_perfiles(){
        return $this->hasMany(FotoPerfil::class);
    }
}
