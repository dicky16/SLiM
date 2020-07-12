<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_guru');
            $table->string('judul_tugas');
            $table->string('deskripsi')->nullable();
            $table->string('file_path')->nullable();
            $table->string('deadline')->nullable();
            $table->integer('id_kelas');
            $table->integer('id_mata_pelajaran');
            $table->string('tanggal_buat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
