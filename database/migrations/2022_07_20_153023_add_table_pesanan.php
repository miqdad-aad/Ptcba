<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
            $table->string('kode_pesanan')->nullable();
            $table->string('tempat_pengambilan')->nullable();
            $table->integer('kabupaten_pengambilan')->nullable();
            $table->integer('kecamatan_pengambilan')->nullable();
            $table->string('alamat_pengambilan')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->string('nomor_penerima')->nullable();
            $table->integer('kabupaten_penerima')->nullable();
            $table->integer('kecamatan_penerima')->nullable();
            $table->string('alamat_penerima')->nullable();
            $table->integer('status_pembayaran')->nullable();
            $table->integer('status_pengiriman')->nullable();
            $table->integer('id_user')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
}
