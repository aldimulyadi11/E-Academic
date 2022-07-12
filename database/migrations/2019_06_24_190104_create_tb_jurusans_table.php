<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jurusans', function (Blueprint $table) {
            $table->char('kode_jur',10)->primary();
            $table->string('nama_jur',100)->unique();
            $table->string('nama_fak');
            $table->string('jenjang');
            $table->char('fk_kode_fak',10);
            $table->foreign('fk_kode_fak')
                   ->references('kode_fakultas')
                   ->on('tb_fakultas');
            $table->char('fk_kode_nidn',10);
            $table->foreign('fk_kode_nidn')
                   ->references('nidn')
                   ->on('tb_dosens'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jurusans');
    }
}
