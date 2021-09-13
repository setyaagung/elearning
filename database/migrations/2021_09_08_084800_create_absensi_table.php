<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id_absensi');
            $table->unsignedBigInteger('id_detail_materi');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->dateTime('waktu');
            $table->timestamps();

            $table->foreign('id_detail_materi')->references('id_detail_materi')->on('detail_materi')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
