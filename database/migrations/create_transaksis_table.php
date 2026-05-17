<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->unsignedBigInteger('id_user'); // Siapa kasirnya?
            $table->bigInteger('total_harga');
            $table->bigInteger('bayar');
            $table->bigInteger('kembalian');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
