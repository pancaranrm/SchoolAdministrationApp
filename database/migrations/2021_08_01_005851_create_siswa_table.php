<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->length(10);
            $table->string('nama_siswa', 30);
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 15);
            $table->date('tgl_lahir');
            $table->string('agama', 20);
            $table->text('foto');
            $table->foreignId('id_kelas');
            $table->foreignId('id_jurusan');
            $table->timestamps();

            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->foreign('id_jurusan')->references('id')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
