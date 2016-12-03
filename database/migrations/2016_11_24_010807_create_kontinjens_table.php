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
            $table->string('ketua')->nullable();
            $table->string('timbalan')->nullable();
            $table->string('urusetia1')->nullable();
            $table->string('urusetia2')->nullable();
            $table->string('urusetia3')->nullable();
            $table->string('urusetia4')->nullable();
            $table->string('urusetia5')->nullable();
            $table->string('urusetia6')->nullable();
            $table->string('urusetia7')->nullable();
            $table->string('urusetia8')->nullable();
            $table->string('urusetia9')->nullable();
            $table->string('urusetia10')->nullable();
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
