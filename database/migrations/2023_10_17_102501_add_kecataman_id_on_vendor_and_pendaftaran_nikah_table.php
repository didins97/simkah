<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftaran_pernikahan', function(Blueprint $table){
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
        });

        Schema::table('transaksi', function(Blueprint $table){
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
        });

        Schema::table('vendor', function(Blueprint $table){
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftaran_pernikahan', function(Blueprint $table){
            $table->dropColumn('kecamatan_id');
        });

        Schema::table('transaksi', function(Blueprint $table){
            $table->dropColumn('kecamatan_id');
        });

        Schema::table('vendor', function(Blueprint $table){
            $table->dropColumn('kecamatan_id');
        });
    }
};
