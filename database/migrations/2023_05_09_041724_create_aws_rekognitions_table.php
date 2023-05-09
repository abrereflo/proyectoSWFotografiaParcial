<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwsRekognitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aws_rekognitions', function (Blueprint $table) {
            $table->id();

            $table->string('faceId');

            $table->foreignId('cliente_id') //Hace referencia imagenExtraCli
            ->nullable()
            ->constrained('users')// usaremos rol de cliente de la tabla users
            ->cascadeOnUpdate()/* actualizacion en cascada */
            ->nullOnDelete(); /* y cuando se elimine quede en null */


            $table->foreignId('fotos_id') //Hace referencia imagenExtraCli
            ->nullable()
            ->constrained('fotos')
            ->cascadeOnUpdate()/* actualizacion en cascada */
            ->nullOnDelete(); /* y cuando se elimine quede en null */

            $table->integer('evento_id');

            $table->string('path_foto');
            $table->float('similitud');
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
        Schema::dropIfExists('aws_rekognitions');
    }
}
