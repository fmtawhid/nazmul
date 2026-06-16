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
        Schema::create('multi_express_orders', function ($table) {
            $table->id();
            $table->foreignId('deal_id')->constrained('multi_express_deals')->onDelete('cascade');
            $table->string('name');
            $table->string('contact_no');
            $table->string('email')->nullable();
            $table->text('address');
            $table->integer('quantity')->default(1);
            $table->enum('payment_type',['full','partial'])->default('full');
            $table->enum('payment_status',['pending','paid','partial_paid'])->default('pending');
            $table->enum('delivery_type',['pickup','dhaka','outside']);
            $table->enum('delivery_status',['pending','processing','delivered','cancelled'])->default('pending');
            $table->decimal('total_price',10,2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_express_orders');
    }
};
