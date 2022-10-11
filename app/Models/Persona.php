<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = [
    'nombre',
    'primer_apellido',
    'segundo_apellido',
    'ci',
    'genero',
    'celular',
    'direccion',
    'correo'];

    public function fotografos(){
        return $this->hasOne(Fotografo::class);
    }

    public function clientes(){
        return $this->hasOne(Cliente::class);
    }


}
