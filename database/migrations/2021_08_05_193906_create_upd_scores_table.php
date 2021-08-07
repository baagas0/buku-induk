<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upd_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upd_id');
            $table->foreignId('th_pelajaran_id');
            $table->foreignId('student_id');
            $table->string('n_smt_1');
            $table->string('n_smt_2');
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
        Schema::dropIfExists('upd_scores');
    }
}
