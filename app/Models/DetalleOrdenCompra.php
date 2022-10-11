<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_orden_compras';

    protected $fillable = ['precio','cantidad','subtotal','album_id','orden_compra_id'];

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function orden_compra(){
        return $this->belongsTo(OrdenCompra::class);
    }
}
