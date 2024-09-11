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
        Schema::create('resitemp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_resi');
            $table->unsignedBigInteger('id_kustomer');
            $table->timestamps();

            $table->foreign('id_kustomer')
                ->references('id')
                ->on('kustomer')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resitemp');
    }
};
