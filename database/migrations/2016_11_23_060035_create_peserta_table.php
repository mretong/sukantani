<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nokp');
            $table->string('jantina', 20);
            $table->string('noPekerja', 20);
            $table->string('tarafJawatan', 20);
            $table->string('gredJawatan', 20);
            $table->string('tarikhLantikan');
            $table->string('vege', 10);
            $table->string('role', 15);
            $table->string('noAtlet', 7);
            $table->string('photo', 255);
            $table->integer('agensi_id', false, false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peserta');
    }
}
