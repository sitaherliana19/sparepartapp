<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_keluar');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('stock_keluar');
            $table->float('total_belanja', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('laporan_barang_keluar');
    }
};
