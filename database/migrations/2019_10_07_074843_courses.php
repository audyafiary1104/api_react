<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id_courses')->primary();
            $table->string('category_course');
            $table->foreign('category_course')->references('id_category_courses')->on('category_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('create_by');
            $table->string('name_course');
            $table->string('post');
            $table->string('type_course');
            $table->string('file_course');
            $table->foreign('type_course')->references('type_course_id')->on('type_course')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('file_course')->references('id_file_course')->on('file_course')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('courses');
    }
}
