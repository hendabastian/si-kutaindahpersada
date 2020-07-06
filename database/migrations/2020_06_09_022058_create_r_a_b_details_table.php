<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRABDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_rab_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('rab_id');
            $table->string('uraian');
            $table->text('deskripsi')->nullable();
            $table->string('satuan');
            $table->integer('volume');
            $table->integer('harga_satuan');
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
        Schema::dropIfExists('t_rab_detail');
    }
}
