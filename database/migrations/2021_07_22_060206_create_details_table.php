<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
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
        Schema::dropIfExists('detail');
    }
}
