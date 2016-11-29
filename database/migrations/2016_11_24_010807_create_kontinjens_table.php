<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontinjensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontinjens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('ketua');
            $table->string('timbalan');
            $table->string('urusetia1');
            $table->string('urusetia2');
            $table->string('urusetia3');
            $table->string('urusetia4');
            $table->string('urusetia5');
            $table->string('urusetia6');
            $table->string('urusetia7');
            $table->string('urusetia8');
            $table->string('urusetia9');
            $table->string('urusetia10');
            $table->string('agensi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontinjens');
    }
}
