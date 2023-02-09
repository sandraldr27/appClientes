<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->float('precio');
            $table->unsignedBigInteger('cliente_id'); //Aquí relacionamos la tabla de los pedidos con el id del cliente//
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade'); //Si el cliente relacionado se borra en la tabla de clientes, se borrarán todos los datos de sus pedidos//
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
        Schema::dropIfExists('pedidos');
    }
};
