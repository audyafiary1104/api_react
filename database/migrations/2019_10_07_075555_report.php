<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->uuid('id_report')->primary();
            $table->string('forum_id');
            $table->string('data_id');
            $table->string('report_type');
            $table->foreign('report_type')->references('id_report_type')->on('report_type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('data_id')->references('data_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('notes');
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
        Schema::dropIfExists('report');
    }
}
