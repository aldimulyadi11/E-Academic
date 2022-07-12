<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwals', function (Blueprint $table) {
            $table->increments('kode_jadwal');                      
            $table->string('hari');
            $table->string('matkul',50)->unique();
            $table->string('ruangan');
            $table->char('fk_kode_matkul',10);
            $table->char('fk_kode_jam',2);

            $table->foreign('fk_kode_matkul')
                   ->references('kode_matkul')
                   ->on('tb_mata_kuliahs');

            $table->foreign('fk_kode_jam')
                   ->references('kode_jam')
                   ->on('tb_jam_kuliahs');
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
        Schema::dropIfExists('tb_jadwals');
    }
}
