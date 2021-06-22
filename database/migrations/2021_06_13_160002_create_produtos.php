<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_categorias');
            $table->unsignedBigInteger('id_tamanhos');
            $table->string('nome', 250);
            $table->text('descricao', 250);
            $table->integer('quantidade_atual');
            $table->decimal('valor_unitario', 15, 2);
            $table->string('slug', 250);
            $table->timestamps();
            $table->softDeletes();
            

            $table->foreign('id_categorias')->references('id')->on('categorias');
            $table->foreign('id_tamanhos')->references('id')->on('tamanhos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}