<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_db', function (Blueprint $table) {
            $table->uuid('event_id')->primary();
            $table->string('event_name');
            $table->string('details');
            $table->string('event_type_id');
            $table->foreign('event_type_id')->references('event_type_id')->on('event_type')->onDelete('cascade')->onUpdate('cascade');
            $table->string('event_file_id');
            $table->foreign('event_file_id')->references('event_file_id')->on('event_file')->onDelete('cascade')->onUpdate('cascade');
            $table->string('data_id');
            $table->foreign('data_id')->references('data_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date_start');
            $table->date('date_finish');
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
        Schema::dropIfExists('event_db');
    }
}
