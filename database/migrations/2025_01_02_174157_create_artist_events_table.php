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
        Schema::create('artist_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('artist_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['event_id', 'artist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_events');
    }
};
