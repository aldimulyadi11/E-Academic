<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dosens', function (Blueprint $table) {
            $table->char('nidn',10)->primary();
            $table->string('nama_dosen');
            $table->string('email',100)->unique();            
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->char('agama',10);
            $table->char('jk',10);
            $table->char('goldar',3);
            $table->string('pend_akhir');
            $table->string('jabatan');
            $table->char('no_hp',14)->unique();
            $table->string('kawin');
            $table->string('gelar');            
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
        Schema::dropIfExists('tb_dosens');
    }
}
