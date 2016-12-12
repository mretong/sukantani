<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcaraPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara_peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acara_id')->unsigned()->index();
            $table->foreign('acara_id')->references('id')->on('acara')->onDelete('cascade');
            $table->integer('peserta_id')->unsigned()->index();
            $table->foreign('peserta_id')->references('id')->on('peserta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acara_peserta');
    }
}
