<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total', 15, 2);
            $table->integer('quantidade_itens');

            $table->unsignedBigInteger('id_clientes');
            
            $table->timestamps();

            $table->foreign('id_clientes')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
