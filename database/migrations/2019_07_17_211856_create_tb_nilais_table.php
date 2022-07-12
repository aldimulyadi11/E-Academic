<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilais', function (Blueprint $table) {
            $table->increments('kode_nilai');
            $table->string('nama_mhs');
            $table->string('nama_matkul');
            $table->string('jurusan');
            $table->string('semester');
            $table->char('sks',10);
            $table->char('tahun_aka',10);
            $table->char('absen',10);
            $table->char('tugas',10);
            $table->char('uts',10);
            $table->string('uas');                        
            $table->char('total',10);
            $table->string('keterangan');
            $table->string('grade');
            $table->char('bobot',10);
            $table->char('jumlah',10);
            $table->char('tot_sks',10);
            $table->char('tot_bobot',10);
            $table->char('tot_jumlah',10);
            $table->char('ip',10);
            $table->char('ipk',10);
            $table->char('fk_nim',10);
            $table->foreign('fk_nim')
                   ->references('nim')
                   ->on('tb_mhs');

            $table->char('fk_nidn',10);
            $table->foreign('fk_nidn')
                   ->references('nidn')
                   ->on('tb_dosens');

            $table->char('fk_kode_matkul',10);
            $table->foreign('fk_kode_matkul')
                   ->references('kode_matkul')
                   ->on('tb_mata_kuliahs');
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
        Schema::dropIfExists('tb_nilais');
    }
}
