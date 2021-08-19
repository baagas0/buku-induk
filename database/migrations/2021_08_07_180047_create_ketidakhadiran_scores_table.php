<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetidakhadiranScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketidakhadiran_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ketidakhadiran_id');
            $table->foreignId('th_pelajaran');
            $table->foreignId('student_id');
            $table->integer('n_smt_1');
            $table->integer('n_smt_2');
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
        Schema::dropIfExists('ketidakhadiran_scores');
    }
}
