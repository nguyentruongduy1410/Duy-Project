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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index('orders_user_id_foreign');
            $table->enum('payment_method', ['COD', 'Banking', 'Wallet', 'Card'])->default('COD');
            $table->enum('payment_status', ['pending', 'done'])->default('pending');
            $table->enum('status', ['pending', 'shipping', 'success', 'cancel'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
