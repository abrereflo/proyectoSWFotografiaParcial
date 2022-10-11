<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'orden_compras';

    protected $fillable = ['monto_total','tipo_pago','estado','user_id','cliente_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function detalles_orden_compras(){
        return $this->hasMany(DetalleOrdenCompra::class);
    }

}
