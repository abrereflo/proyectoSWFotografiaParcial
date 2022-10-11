<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    protected $fillable = [
        'path',
        'price',
        'album_id',
        'fotografo_id',
    ];

    public function Album() {
        return $this->belongsTo(Album::class, 'evento_id');
    }

    public function fotografo(){
        return $this->belongsTo(Fotografo::class,'fotografo_id');
    }

    /*public function detalles_compra(){
        return $this->belongsTo(DetalleOrdenCompra::class,'foto_id');
    }*/
}
