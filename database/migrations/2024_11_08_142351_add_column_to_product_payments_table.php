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
        Schema::table('product_payments', function (Blueprint $table) {
            $table->decimal('price', 10, 2);

            $table->decimal('discount_price', 10, 2);

            $table->unsignedBigInteger('product_id');

            $table->unsignedBigInteger('voucher_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_payments', function (Blueprint $table) {
            //
            $table->dropColumn(['voucher_id', 'product_id', 'price', 'discount_price']);
        });
    }
};
