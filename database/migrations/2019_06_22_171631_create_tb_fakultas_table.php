<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbFakultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_fakultas', function (Blueprint $table) {
            $table->char('kode_fakultas',10)->primary();
            $table->string('nama_fakultas',100)->unique();
            $table->char('dekan',10)->unique();
            $table->foreign('dekan')
                   ->references('nidn')
                   ->on('tb_dosens');           
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
        Schema::dropIfExists('tb_fakultas');
    }
}
