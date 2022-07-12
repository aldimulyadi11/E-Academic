<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_khs', function (Blueprint $table) {
            $table->increments('kode_khs');
            $table->char('nim_khs',10);
            $table->string('kode_matkul');
            $table->string('matkul');
            $table->string('sks');
            $table->string('grade');
            $table->string('angka');
            $table->string('jumlah');
            $table->string('total_sks');
            $table->string('total_angka');
            $table->string('total_jumlah');
            $table->string('ip');
            $table->string('ipk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_khs');
    }
}
