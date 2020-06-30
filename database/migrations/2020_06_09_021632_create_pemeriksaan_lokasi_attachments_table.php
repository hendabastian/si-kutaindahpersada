<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanLokasiAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pemeriksaan_lokasi_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('pemeriksaan_lokasi_id');
            $table->string('file');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('t_pemeriksaan_lokasi_attachments');
    }
}
