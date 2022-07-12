<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_krs', function (Blueprint $table) {
            $table->increments('id_matkul');
            $table->string('nama_matkul');
            $table->integer('sks');
            $table->string('kategori');
            $table->string('kode_matkuls');
            $table->string('dosen');
            $table->string('gelar');
            $table->string('jurusan');
            $table->string('semester');
            $table->string('tahun_aka');

            $table->char('fk_nim',10);
            $table->foreign('fk_nim')
                   ->references('nim')
                   ->on('tb_mhs');

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
        Schema::dropIfExists('tb_krs');
    }
}
