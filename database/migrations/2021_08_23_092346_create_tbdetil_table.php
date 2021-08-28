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
            $table->string('kode_user', 50);
            $table->string('nama_siswa', 50);
            $table->string('kelas', 50);
            $table->string('kodebarang', 50);
            $table->string('nama_barang', 50);
            $table->integer('qty');
            $table->dateTime('tgl_pinjam', $presicion = 0)->nullable()->default(null);
            $table->dateTime('tgl_kembali', $presicion = 0)->nullable()->default(null);
            $table->string('status', 50);
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
