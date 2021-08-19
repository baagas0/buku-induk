<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelulusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelulusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('uraian');
            $table->string('ijazah')->nullable()->default('-');
            $table->string('skhun')->nullable()->default('-');
            $table->string('shuambn')->nullable()->default('-');
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
        Schema::dropIfExists('kelulusans');
    }
}
