<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_orden_compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',2);
            $table->decimal('cantidad',2);
            $table->decimal('subtotal',2);

            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('orden_compra_id');

            $table->foreign('album_id')->on('albums')->references('id');
            $table->foreign('orden_compra_id')->on('orden_compras')->references('id');

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
        Schema::dropIfExists('detalle_orden_compras');
    }
}
