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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tiket'); // Column for ticket name
        $table->decimal('harga', 10, 2); // Column for ticket price, with two decimal places
        $table->string('venue'); // Column for the venue
        $table->string('kategori'); // Column for ticket category
        $table->timestamps(); // Created at and Updated at timestamps
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
