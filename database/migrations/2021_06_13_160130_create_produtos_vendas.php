<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_vendas', function (Blueprint $table) {
            $table->id();
            $table->double('quantidade', 15, 5);
            $table->double('subtotal', 15, 5);
            $table->unsignedBigInteger('id_vendas');
            $table->unsignedBigInteger('id_produtos');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_vendas')->references('id')->on('vendas');
            $table->foreign('id_produtos')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_vendas', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}