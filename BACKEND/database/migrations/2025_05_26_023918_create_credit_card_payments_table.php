<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('credit_card_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // jika ada relasi ke users
            $table->string('card_holder_name');
            $table->string('card_number'); // Simpan 4 digit terakhir saja!
            $table->string('expiry_date');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('pending'); // pending, success, failed
            $table->timestamps();

            // Jika ada tabel users:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('credit_card_payments');
    }
};

