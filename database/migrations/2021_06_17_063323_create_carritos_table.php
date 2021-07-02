<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->integer('precio_producto');
            $table->string('img_url');
            $table->integer('off_producto');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('producto_id');

            $table->string('pagado');

            $table->timestamps();

              //Relaciones
              $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');

                 //Relaciones
                 $table->foreign('producto_id')
                 ->references('id')
                 ->on('productos')
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
        Schema::dropIfExists('carritos');
    }
}
