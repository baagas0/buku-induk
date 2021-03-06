<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporPdfExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapor_pdf_exports', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->foreignId('kelas_id');
            $table->string('th_pelajaran');
            $table->enum('semester', [0,1,2])->default(0);
            $table->integer('count_job')->default(0);
            $table->integer('on_going_job')->default(0);
            $table->enum('status', ['pending', 'proccess', 'success', 'error'])->default('pending');
            $table->foreignId('created_by');
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
        Schema::dropIfExists('rapor_pdf_exports');
    }
}
