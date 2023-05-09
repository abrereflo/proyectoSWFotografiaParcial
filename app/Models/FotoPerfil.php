<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPerfil extends Model
{
    use HasFactory;
    protected $table = 'fotos_perfiles';

    protected $fillable = ['id','imagen','cliente_id'];

    public function cliente(){
        return $this->hasOne(Cliente::class);
    }


}
