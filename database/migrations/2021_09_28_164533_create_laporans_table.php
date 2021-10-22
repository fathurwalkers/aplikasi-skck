<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('laporan_header');
            $table->string('laporan_jeniskeperluan'); // Pendaftaran - Perpanjangan - Verifikasi
            $table->string('laporan_body');
            $table->string('laporan_kode');
            $table->string('laporan_pengirim');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
