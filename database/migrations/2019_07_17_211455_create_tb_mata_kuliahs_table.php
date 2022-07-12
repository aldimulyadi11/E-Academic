<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mata_kuliahs', function (Blueprint $table) {
            $table->char('kode_matkul',10)->primary();
            $table->string('nama_matkul');
            $table->integer('sks');
            $table->string('kategori');
            $table->string('dosen');
            $table->string('jurusan');
            $table->string('semester');
            $table->string('tahun_aka');
            $table->char('fk_nidn',10);
            $table->foreign('fk_nidn')
                   ->references('nidn')
                   ->on('tb_dosens');
            $table->char('fk_kode_tahunAka',10);
            $table->foreign('fk_kode_tahunAka')
                   ->references('kode_tahunAka')
                   ->on('tb_tahun_akas');
            $table->rememberToken();
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
        Schema::dropIfExists('tb_mata_kuliahs');
    }
}
