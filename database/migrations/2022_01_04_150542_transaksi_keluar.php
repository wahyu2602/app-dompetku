<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('kode');
            $table->string('deskripsi_transaksi');
            $table->date('tanggal');
            $table->integer('nilai');
            $table->unsignedBigInteger('dompet_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('status_id');
            $table->foreign('dompet_id')->references('id')->on('dompet');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('status_id')->references('id_transaksi')->on('transaksi_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_keluar');
    }
}
