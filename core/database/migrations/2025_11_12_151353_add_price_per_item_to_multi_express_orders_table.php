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
        Schema::table('multi_express_orders', function (Blueprint $table) {
            $table->decimal('price_per_item',10,2)->nullable()->after('quantity');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multi_express_orders', function (Blueprint $table) {
            //
        });
    }
};
