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
            $table->string('kode_user', 50);
            $table->string('kodebarang', 50);
            $table->string('nama', 50);
            $table->integer('qty');
            $table->string('lokasi', 50);
            $table->dateTime('tgl_pinjam', $presicion = 0)->nullable()->default(null);
            $table->dateTime('tgl_kembali', $presicion = 0)->nullable()->default(null);
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
