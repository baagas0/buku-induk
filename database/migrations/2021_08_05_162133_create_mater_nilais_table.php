<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mater_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('th_pelajaran_id');
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
        Schema::dropIfExists('mater_nilais');
    }
}
