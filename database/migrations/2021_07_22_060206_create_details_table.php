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
            $table->string('nama_lengkap');
            $table->string('ttl');
            $table->string('agama');
            $table->string('kebangsaan');
            $table->string('jenis_kelamin');
            $table->string('status_kawin');
            $table->string('pekerjaan');
            $table->string('alamat_lengkap');
            $table->string('no_ktp');
            $table->string('no_passport')->nullable();
            $table->string('no_kitaskitap')->nullable();
            $table->string('no_telepon');

            $table->string('status_hubungan'); // Suami - Istri
            $table->string('nama_pasangan');
            $table->string('umur_pasangan');
            $table->string('agama_pasangan');
            $table->string('kebangsaan_pasangan');
            $table->string('pekerjaan_pasangan');
            $table->string('alamat_pasangan');

            $table->string('nama_ayah');
            $table->string('umur_ayah');
            $table->string('agama_ayah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_skck');
    }
}
