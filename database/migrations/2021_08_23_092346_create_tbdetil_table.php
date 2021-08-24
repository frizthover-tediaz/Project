<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbdetilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbdetil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('nama_barang');
            $table->string('qty');
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
        Schema::dropIfExists('tbdetil');
    }
}
