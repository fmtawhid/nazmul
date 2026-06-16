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
        Schema::table('multi_express_deals', function (Blueprint $table) {
            $table->dateTime('deal_start_time')->nullable()->after('delivery_end_date');
            $table->dateTime('deal_end_time')->nullable()->after('deal_start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multi_express_deals', function (Blueprint $table) {
            $table->dropColumn(['deal_start_time', 'deal_end_time']);
        });
    }
};
