<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoqueItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('estoque_id')->unsigned();
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->integer('qtde');
            $table->double('valor_unitario',10,2);
            $table->double('valor_desconto',10,2);
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
        Schema::dropIfExists('estoque_items');
    }
}
