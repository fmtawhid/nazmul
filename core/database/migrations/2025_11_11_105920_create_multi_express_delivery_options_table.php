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
        Schema::create('multi_express_delivery_options', function ($table) {
            $table->id();
            $table->foreignId('deal_id')->constrained('multi_express_deals')->onDelete('cascade');
            $table->enum('type',['pickup','dhaka','outside']);
            $table->string('label');
            $table->decimal('charge_per_item',10,2)->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_express_delivery_options');
    }
};
