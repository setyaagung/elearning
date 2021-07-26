<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_materi', function (Blueprint $table) {
            $table->bigIncrements('id_detail_materi');
            $table->unsignedBigInteger('id_materi');
            $table->string('judul');
            $table->string('slug');
            $table->string('video')->nullable();
            $table->string('file')->nullable();
            $table->text('deskripsi');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('id_materi')->references('id_materi')->on('materi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_materi');
    }
}
