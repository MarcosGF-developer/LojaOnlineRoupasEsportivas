<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->unsignedBigInteger('id_produtos');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('fotos_produtos', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
