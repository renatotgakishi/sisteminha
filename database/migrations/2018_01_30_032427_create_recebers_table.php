<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecebersTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('recebers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('pessoa_id')->on('clientes')->onDelete('cascade');
            $table->string('nr_doc');
            $table->string('descricao');
            $table->date('data_emissao');
            $table->date('data_vencto');
            $table->double('valor',10,2);
            $table->integer('id_mov_fin');
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
        Schema::dropIfExists('recebers');
    }
}
