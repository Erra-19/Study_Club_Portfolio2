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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receipt_id');
            $table->string('staff_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('item_id');                                             
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('receipt_id')
                ->references('id')
                ->on('receipttemps')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('staff_id')
                ->references('staff_id')
                ->on('staffs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('shipment_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment');
    }
};
