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
    Schema::create('detail__transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tiket_id')->constrained('tickets')->onUpdate('cascade')->onDelete('cascade');
        $table->foreignId('transaksi_id')->constrained('transaksis')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('quantity'); 
        $table->decimal('subtotal', 8, 2); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__transaksis');
    }
};
