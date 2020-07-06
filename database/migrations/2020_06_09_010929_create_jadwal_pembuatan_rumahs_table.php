<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPembuatanRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_jadwal_pembuatan_rumah', function (Blueprint $table) {
            $table->id();
            $table->integer('pemesanan_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
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
        Schema::dropIfExists('t_jadwal_pembuatan_rumah');
    }
}
