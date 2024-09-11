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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resi');
            $table->unsignedBigInteger('id_staff');
            $table->unsignedBigInteger('id_kustomer');
            $table->unsignedBigInteger('id_barang');                                             
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_resi')
                ->references('id')
                ->on('resitemp')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('id_staff')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_kustomer')
                ->references('id')
                ->on('kustomer')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_barang')
                ->references('id')
                ->on('barang')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_status')
                ->references('id')
                ->on('pengiriman_status')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
