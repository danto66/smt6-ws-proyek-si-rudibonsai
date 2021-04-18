<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationUserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->foreign('provinsi_id')->references('id')->on('wilayah_provinsi');
            $table->foreign('kabupaten_id')->references('id')->on('wilayah_kabupaten');
            $table->foreign('kecamatan_id')->references('id')->on('wilayah_kecamatan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
