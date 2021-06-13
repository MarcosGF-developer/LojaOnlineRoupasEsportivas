<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_users');
            $table->string('cpf', 14);
            $table->string('rg', 12);
            $table->timestamp('data_nascimento');
            $table->string('telefone', 13);
            $table->boolean('admin')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
