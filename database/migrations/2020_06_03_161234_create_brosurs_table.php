<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrosursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_brosur', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('model');
            $table->string('harga');
            $table->string('lama_pembangunan');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
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
        Schema::dropIfExists('m_brosur');
    }
}
