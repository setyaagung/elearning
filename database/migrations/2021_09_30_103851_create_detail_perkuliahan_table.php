<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPerkuliahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_perkuliahan', function (Blueprint $table) {
            $table->bigIncrements('id_detail_perkuliahan');
            $table->unsignedBigInteger('id_perkuliahan');
            $table->date('tanggal');
            $table->text('kompetensi_dasar')->nullable();
            $table->text('sub_kompetensi')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_perkuliahan')->references('id_perkuliahan')->on('perkuliahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_perkuliahans');
    }
}
