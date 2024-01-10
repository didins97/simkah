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
        Schema::create('calon_pengantin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('umur');
            $table->enum('warga_negara', ['wni', 'wna']);
            $table->string('negara_asal')->nullable();
            $table->string('passpor')->nullable();
            $table->string('agama');
            $table->enum('status', ['bk', 'k', 'ch', 'cm']);
            $table->string('nohp');
            $table->string('pekerjaan');
            $table->string('email');
            $table->text('alamat');
            $table->string('pendidikan');
            $table->string('foto');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->boolean('status_ayah');
            $table->boolean('status_ibu');
            $table->string('tlahir_ayah')->nullable();
            $table->string('tlahir_ibu')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('alamat_ibu')->nullable();
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
        Schema::dropIfExists('calon_pengantin');
    }
};
