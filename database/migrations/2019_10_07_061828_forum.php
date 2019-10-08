<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Forum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->uuid('id_forums')->primary();
            $table->string('create_by');
            $table->string('id_forum_type');
            $table->foreign('id_forum_type')->references('id_forum_type')->on('forum_type')->onDelete('cascade')->onUpdate('cascade');
            $table->string('posts');
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
        Schema::dropIfExists('forums');
    }
}
