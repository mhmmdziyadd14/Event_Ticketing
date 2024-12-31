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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreignId('event_id')->constrained('events')->onUpdate('cascade')->onDelete('cascade'); 
            $table->decimal('grand_total', 8, 2); 
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->text('cancellation_reason')->nullable(); // Alasan pembatalan transaksi
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
