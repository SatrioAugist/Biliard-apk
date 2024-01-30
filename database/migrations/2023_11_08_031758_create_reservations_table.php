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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->integer('nomor_unik');
            $table->unsignedBigInteger('table_id');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->integer('jumlah_jam');
            $table->integer('harga_bayar');
            $table->string('status');
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
