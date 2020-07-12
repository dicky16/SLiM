<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelMataPelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
          // $table->foreign('user_id')->references('id')->on('users');
            $table->bigIncrements('id');
            $table->string('hari');
            $table->integer('id_mata_pelajaran');
            $table->integer('id_kelas');
            $table->string('jam');
            $table->integer('id_guru');
            $table->timestamps();

            $table->foreign('id_mata_pelajaran')
            ->references('id')
            ->on('tabel_mata_pelajaran');

            $table->foreign('id_kelas')
            ->references('id')
            ->on('tabel_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
