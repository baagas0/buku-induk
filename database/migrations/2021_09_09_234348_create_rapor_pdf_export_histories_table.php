<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporPdfExportHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapor_pdf_export_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapor_pdf_exports_id');
            $table->foreignId('student_id')->default(0);
            $table->string('title');
            $table->enum('type', ['alert', 'student'])->default('alert');
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
        Schema::dropIfExists('rapor_pdf_export_histories');
    }
}
