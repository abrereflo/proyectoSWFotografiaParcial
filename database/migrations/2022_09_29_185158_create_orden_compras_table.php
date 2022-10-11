<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            $table->float('monto_total');
            $table->float('tipo_pago');
            $table->char('estado'); /* V- Validado - R- rechazado */
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('cliente_id')->on('clientes')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_compras');
    }
}
