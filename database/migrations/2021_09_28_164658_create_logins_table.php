<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();

            $table->string('login_nama');
            $table->string('login_username');
            $table->string('login_password');
            $table->string('login_email');
            $table->text('login_token');
            $table->string('login_level'); // ADMIN - PETUGAS - USER
            $table->string('login_status'); // unverified / verified
            
            $table->unsignedBigInteger('skck_id')->nullable();
            $table->foreign('skck_id')->references('id')->on('data_skck')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('login');
    }
}
