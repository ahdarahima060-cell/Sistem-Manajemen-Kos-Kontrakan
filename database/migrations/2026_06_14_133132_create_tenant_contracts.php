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
        Schema::create('tenant_contracts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('room_id')
                  ->constrained('rental_rooms')
                  ->cascadeOnDelete();

            $table->string('tenant_name', 100);

            $table->string('id_number', 20);

            $table->string('phone', 20);

            $table->string('emergency_contact', 20)->nullable();

            $table->date('contract_start');

            $table->date('contract_end');

            $table->decimal('monthly_rent', 10, 2);

            $table->decimal('deposit_paid', 10, 2)
                  ->default(0);

            $table->enum('payment_status', [
                'current',
                'overdue',
                'paid_ahead'
            ])->default('current');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_contracts');
    }
};
