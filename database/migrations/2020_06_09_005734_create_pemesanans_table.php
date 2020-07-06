<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('no_pemesanan');
            $table->text('deskripsi');
            $table->string('nama_pemesan');
            $table->text('alamat');
            $table->text('alamat_proyek');
            $table->string('tipe_bangunan');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->string('file_ktp');
            $table->string('no_ktp');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('t_pemesanan');
    }
}
