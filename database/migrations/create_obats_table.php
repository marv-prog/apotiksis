<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id('id_obat'); // Primary Key
            $table->string('nama_obat');
            $table->unsignedBigInteger('id_kategori'); // Foreign Key
            $table->integer('harga_obat');
            $table->string('satuan');
            $table->integer('stok');
            $table->date('tanggal_exp');
            $table->timestamp('waktu_produksi');
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
        Schema::dropIfExists('obats');
    }
}
