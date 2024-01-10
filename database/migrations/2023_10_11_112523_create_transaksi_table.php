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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('nama_penerima');
            $table->dateTime('tanggal_acara');
            $table->string('email_penerima');
            $table->string('nohp', 20);
            $table->text('alamat');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vendor_id');
            $table->enum('status', ['menunggu_pembayaran', 'dibayar', 'selesai', 'dibatalkan', 'uang_muka_dibayar', 'menunggu_persetujuan', 'dalam_proses'])->default('menunggu_persetujuan');
            $table->string('bukti_pembayaran_1')->nullable();
            $table->string('bukti_pembayaran_2')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
