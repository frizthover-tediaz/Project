<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbadmin', function (Blueprint $table) {
            $table->integer('kode_user')->primary();
            $table->string('nama', 50);
            $table->string('pass', 50);
            $table->dateTime('terakhir_login')->nullable()->default(null);;
            $table->dateTime('terakhir-logout')->nullable()->default(null);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbadmin');
    }
}
