<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamanhos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamanhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sigla', 3);
            $table->string('descricao', 250);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamanhos', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
