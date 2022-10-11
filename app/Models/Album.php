<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = ['cantidad_fotos','file', 'estado','fotografo_id','evento_id'];

    public function fotografo(){
        return $this->belongsTo(Fotografo::class);
    }

    public function evento(){
        return $this->hasMany(Evento::class);
    }
    /*public function detalles_orden_compras(){
        return $this->hasMany(DetalleOrdenCompra::class);
    }*/
}
