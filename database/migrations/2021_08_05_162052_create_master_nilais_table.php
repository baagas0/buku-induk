<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('th_pelajaran');
            $table->enum('is_sub', [0,1])->default(0);
            $table->foreignId('mapel_id');
            $table->foreignId('sub_mapel_id');
            $table->foreignId('kkm');
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
        Schema::dropIfExists('master_nilais');
    }
}
