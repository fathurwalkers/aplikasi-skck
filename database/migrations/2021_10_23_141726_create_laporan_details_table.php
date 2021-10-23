<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('detail_laporan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('laporan_id');
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('detail_id');
            $table->foreign('detail_id')->references('id')->on('data_skck')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_laporan');
    }
}
