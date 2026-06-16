<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('multi_express_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_option_id')->nullable()->after('quantity');

            // foreign key (optional, but recommended)
            $table->foreign('delivery_option_id')
                  ->references('id')
                  ->on('multi_express_delivery_options')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('multi_express_orders', function (Blueprint $table) {
            $table->dropForeign(['delivery_option_id']);
            $table->dropColumn('delivery_option_id');
        });
    }
};
