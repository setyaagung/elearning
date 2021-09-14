<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupToMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->text('group_a')->after('semester')->nullable();
            $table->text('group_b')->after('group_a')->nullable();
            $table->text('group_c')->after('group_b')->nullable();
            $table->text('group_d')->after('group_c')->nullable();
            $table->text('group_e')->after('group_d')->nullable();
            $table->text('group_f')->after('group_e')->nullable();
            $table->text('group_g')->after('group_f')->nullable();
            $table->text('group_h')->after('group_g')->nullable();
            $table->text('group_umum')->after('group_h')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materi', function (Blueprint $table) {
            //
        });
    }
}
