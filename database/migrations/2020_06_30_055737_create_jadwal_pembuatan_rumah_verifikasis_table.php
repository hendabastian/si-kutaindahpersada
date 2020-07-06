<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPembuatanRumahVerifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_jadwal_pembuatan_rumah_verifikasi', function (Blueprint $table) {
            $table->id();
            $table->integer('jadwal_pembuatan_rumah_id');
            $table->integer('status');
            $table->string('keterangan')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('t_jadwal_pembuatan_rumah_verifikasi');
    }
}
