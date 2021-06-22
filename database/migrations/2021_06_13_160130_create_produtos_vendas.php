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
            $table->integer('quantidade');
            $table->decimal('subtotal', 15, 2);
            $table->foreignId('id_vendas')->constrained('vendas');
            $table->foreignId('id_produtos')->constrained('produtos');
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
        Schema::dropIfExists('produtos_vendas', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}