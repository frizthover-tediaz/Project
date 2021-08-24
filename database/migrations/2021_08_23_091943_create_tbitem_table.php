<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbitem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodebarang', 50);
            $table->string('nama', 50);
            $table->integer('qty');
            $table->dateTime('tgl_pinjam', $presicion = 0);
            $table->dateTime('tgl_kembali', $presicion = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbitem');
    }
}
