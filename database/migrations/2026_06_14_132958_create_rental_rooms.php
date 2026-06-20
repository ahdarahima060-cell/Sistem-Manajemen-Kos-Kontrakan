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
        Schema::create('rental_rooms', function (Blueprint $table) {
            $table->id();

            $table->string('room_code', 20)->unique();

            $table->enum('type', [
                'Standard',
                'AC',
                'En-Suite'
            ])->default('Standard');

            $table->integer('floor')->default(1);

            $table->decimal('monthly_price', 10, 2);

            $table->text('facilities')->nullable();

            $table->integer('max_occupants')->default(1);

            $table->decimal('area_m2', 6, 2)->nullable();

            $table->string('photo', 255)->nullable();

            $table->enum('status', [
                'available',
                'occupied',
                'maintenance'
            ])->default('available');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_rooms');
    }
};