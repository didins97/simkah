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
        Schema::create('persetujuan_dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pernikahan_id');
            $table->unsignedBigInteger('dokumen_id');
            $table->boolean('status_calpen_pria');
            $table->boolean('status_calpen_wanita');
            $table->timestamps();

            $table->foreign('dokumen_id')->references('id')->on('dokumen_pernikahan');
            $table->foreign('pernikahan_id')->references('id')->on('pendaftaran_pernikahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_pernikahan');
    }
};
