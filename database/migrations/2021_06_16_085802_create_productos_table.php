<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->integer('precio_actual');
            $table->integer('precio_antes');
            $table->string('descripcion_producto');
            $table->string('categoria_producto');
            $table->string('img_url');
            $table->integer('off_producto');
            $table->unsignedBigInteger('marca_id');
            $table->timestamps();
              //Relaciones
              $table->foreign('marca_id')
              ->references('id')
              ->on('marcas')
              ->onDelete('cascade')
              ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
