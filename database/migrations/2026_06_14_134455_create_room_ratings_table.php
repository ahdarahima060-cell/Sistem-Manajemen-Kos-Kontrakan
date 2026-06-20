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
        Schema::create('room_ratings', function (Blueprint $table) {
            $table->id();

            // Relasi ke kontrak penyewa
            $table->foreignId('contract_id')
                  ->constrained('tenant_contracts')
                  ->cascadeOnDelete();

            // Rating kamar (1 - 5)
            $table->unsignedTinyInteger('rating');

            // Komentar penyewa
            $table->text('comment')->nullable();

            // Tanggal rating dibuat
            $table->timestamp('rated_at')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_ratings');
    }
};