<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('data_skck', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('status_skck')->nullable(); // Verified - Unverified

            $table->string('jenis_keperluan_pembuatan')->nullable();

            $table->string('nama_lengkap')->nullable();

            $table->string('ttl')->nullable();
            $table->string('agama')->nullable();
            $table->string('kebangsaan')->nullable();

            $table->string('kabupaten')->nullable(); // Kabupaten Buton - Kabupaten Buton Selatan 

            $table->string('jenis_kelamin')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('no_passport')->nullable();
            $table->string('no_kitaskitap')->nullable();
            $table->string('no_telepon')->nullable();

            $table->text('jenis_pidana_value_a')->nullable()->default("TIDAK ADA");
            $table->text('jenis_pidana_value_b')->nullable()->default("TIDAK ADA");
            $table->text('jenis_pidana_value_c')->nullable()->default("TIDAK ADA");
            $table->text('jenis_pidana_value_d')->nullable()->default("TIDAK ADA");
            $table->text('jenis_pidana_value_e')->nullable()->default("TIDAK ADA");

            $table->string('status_hubungan')->nullable(); // Suami - Istri 
            $table->string('nama_pasangan')->nullable();
            $table->string('umur_pasangan')->nullable();
            $table->string('agama_pasangan')->nullable();
            $table->string('kebangsaan_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->string('alamat_pasangan')->nullable();

            $table->string('nama_ayah')->nullable();
            $table->string('umur_ayah')->nullable();
            $table->string('agama_ayah')->nullable();

            $table->string('kebangsaan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('alamat_sekarang_ayah')->nullable();

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->unsignedBigInteger('laporan_id')->nullable();
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_skck');
    }
}