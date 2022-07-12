<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mhs', function (Blueprint $table) {
            $table->char('nim',10)->primary();
            $table->string('nama_mhs');
            $table->string('email',100)->unique();            
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->char('agama',10);
            $table->char('jk',10);
            $table->char('goldar',3);
            $table->char('no_hp',14)->unique();
            $table->string('asal');
            $table->string('jurusan');
            $table->char('semester',10);
            $table->char('tahun_aka');
            $table->string('kelas');
            $table->date('tgl_masuk');


            $table->string('nama_ayah');
            $table->string('pend_akhir');            
            $table->string('pekerjaan');
            $table->string('alamat2');
            $table->char('no_hp2',14)->unique();
            $table->char('penghasilan',50);

            $table->string('nama_ibu');
            $table->string('pend_akhir2');            
            $table->string('pekerjaan2');
            $table->string('alamat3');
            $table->char('no_hp3',14)->unique();
            $table->char('penghasilan2',50);
            
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
        Schema::dropIfExists('tb_mhs');
    }
}
