<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('data_id')->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('id_roles');
            $table->foreign('id_roles')->references('id_roles')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('email_verified')->default(false);
            $table->string('Last_ip');
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
        Schema::dropIfExists('users');
    }
}
