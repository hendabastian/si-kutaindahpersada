<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pemeriksaan_lokasi', function (Blueprint $table) {
            $table->id();
            $table->integer('pemesanan_id');
            $table->string('nama_pemilik');
            $table->string('alamat_lokasi');
            $table->string('luas_tanah');
            $table->integer('status');
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
        Schema::dropIfExists('t_pemeriksaan_lokasi');
    }
}
