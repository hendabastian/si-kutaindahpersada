<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipeAndJangkauanToMBrosur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_brosur', function (Blueprint $table) {
            $table->string('tipe')->after('model');
            $table->text('jangkauan')->after('luas_bangunan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_brosur', function (Blueprint $table) {
            $table->dropColumn(['tipe', 'jangkauan']);
        });
    }
}
