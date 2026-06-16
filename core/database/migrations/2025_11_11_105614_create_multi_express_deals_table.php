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
        Schema::create('multi_express_deals', function ($table) {
            $table->id();
            $table->foreignId('category_id')->constrained('multi_express_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('regular_price', 10, 2)->nullable();
            $table->decimal('deal_price', 10, 2)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->integer('min_required')->default(1);
            $table->integer('max_capacity')->nullable();
            $table->integer('purchase_limit_per_user')->nullable();
            $table->enum('stock_status',['ready','upcoming','sold_out'])->default('ready');
            $table->date('delivery_start_date')->nullable();
            $table->date('delivery_end_date')->nullable();
            $table->string('delivery_note')->nullable();
            $table->enum('status',['active','upcoming','closed'])->default('active');
            $table->string('feature_image')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_express_deals');
    }
};
