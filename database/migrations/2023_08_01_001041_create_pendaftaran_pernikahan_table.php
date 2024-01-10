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
        Schema::create('pendaftaran_pernikahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calpen_pria_id');
            $table->unsignedBigInteger('calpen_wanita_id');
            // $table->unsignedBigInteger('kua_id');
            $table->unsignedBigInteger('user_id');
            $table->string('kode_pendaftar')->unique()->nullable();
            $table->dateTime('tanggal_nikah');
            $table->enum('nikah_id', ['diluar', 'dikua'])->default('dikua');
            $table->string('nama_wali');
            $table->enum('status_wali', ['nasab', 'hakim']);
            $table->enum('warga_negara', ['wni', 'wna']);
            $table->string('hubungan_wali')->nullable();
            $table->string('nik_nip_wali')->nullable();
            $table->string('nama_ayah_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('alasan_wali_hakim')->nullable();
            $table->string('tmpt_lahir_wali')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('agama')->nullable();
            $table->enum('status', ['belum_diproses', 'diproses', 'ditolak', 'ditunda', 'diterima', 'selesai', 'dibatalkan']);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('kua_id')->references('id')->on('list_kua')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('calpen_pria_id')->references('id')->on('calon_pengantin')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('calpen_wanita_id')->references('id')->on('calon_pengantin')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_pernikahan');
    }
};
