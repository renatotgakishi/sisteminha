<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mov_fins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portador_id')->unsigned();
            $table->foreign('portador_id')->references('id')->on('portadors')->onDelete('cascade');
            $table->string('historico');
            $table->double('valor',10,2);
            $table->enum('DC',['D','C']);
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
        Schema::dropIfExists('mov_fins');
    }
}
