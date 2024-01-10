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
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 25);
            $table->string('harga');
            $table->enum('jenis_layanan', ['foto_video', 'katering', 'dekorasi', 'rias', 'busana', 'undangan', 'kord_pernikahan']);
            $table->string('kontak');
            $table->text('keterangan');
            $table->string('gambar');
            $table->json('galeri_foto');
            $table->json('caption_galeri');
            $table->text('letak');
            $table->string('latitude');
            $table->string('longitude');
            $table->enum('status', ['disetujui', 'menunggu_persetujuan', 'ditolak'])->default('menunggu_persetujuan');
            $table->timestamp('published_at')->useCurrent();
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
};
