<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_chats', function (Blueprint $table) {
            $table->uuid('group_chats_id')->primary();
            $table->string('group_id');
            $table->string('data_id');
            $table->string('massages');
            $table->foreign('data_id')->references('data_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('group_massages_id')->on('group_massages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('group_chats');
    }
}
