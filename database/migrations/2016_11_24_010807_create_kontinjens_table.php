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
            $table->string('role', 20); // Ketua Kontinjen, Timbalan Ketua Kontinjen dan Urusetia
            $table->string('nokp', 15);
            $table->string('notel');
            $table->string('jantina', 10);
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
