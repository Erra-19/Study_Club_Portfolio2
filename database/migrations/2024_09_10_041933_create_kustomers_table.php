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
        Schema::create('kustomer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('email_pengirim');
            $table->string('nomor_telpon_pengirim');
            $table->string('nama_penerima');
            $table->string('nomor_telpon_penerima');
            $table->string('alamat_kirim');
            $table->string('alamat_tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kustomer');
    }
};
