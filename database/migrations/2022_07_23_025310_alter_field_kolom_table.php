<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFieldKolomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pesanan', function (Blueprint $table) {
            $table->decimal('panjang',20,2)->nullable();
            $table->decimal('lebar',20,2)->nullable();
            $table->decimal('tinggi',20,2)->nullable();
            $table->decimal('harga',20,2)->nullable();
            $table->decimal('total',20,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pesanan', function (Blueprint $table) {
            //
        });
    }
}
