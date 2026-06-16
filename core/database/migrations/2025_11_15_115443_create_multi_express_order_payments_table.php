<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('multi_express_order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('multi_express_orders')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_type', ['full','partial'])->default('full');
            $table->enum('status', ['pending','paid'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('multi_express_order_payments');
    }
};
