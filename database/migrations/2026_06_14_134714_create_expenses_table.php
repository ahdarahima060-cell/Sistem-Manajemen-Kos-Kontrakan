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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            // Nama pengeluaran (contoh: listrik, air, wifi)
            $table->string('title');

            // Kategori pengeluaran (operasional, perawatan, dll)
            $table->string('category')->nullable();

            // Jumlah uang yang keluar
            $table->decimal('amount', 12, 2);

            // Tanggal pengeluaran
            $table->date('expense_date');

            // Keterangan tambahan
            $table->text('description')->nullable();

            // Metode pembayaran (cash, transfer, dll)
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};