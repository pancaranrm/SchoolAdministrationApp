<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->length(20);
            $table->string('nama_guru', 30);
            $table->string('jenis_kelamin_guru', 10);
            $table->string('tempat_lahir_guru', 15);
            $table->date('tgl_lahir_guru');
            $table->text('foto');
            $table->foreignId('id_matpel');
            $table->timestamps();

            $table->foreign('id_matpel')->references('id')->on('matpel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
