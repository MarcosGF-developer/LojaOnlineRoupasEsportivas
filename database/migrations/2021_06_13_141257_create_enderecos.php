<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cidade');
            $table->unsignedBigInteger('id_cliente');
            $table->string('descricao', 250);
            $table->string('logradouro', 250);
            $table->string('numero', 5);
            $table->string('bairro', 250);
            $table->timestamps();
            $table->softDeletes(); 
                
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
}
