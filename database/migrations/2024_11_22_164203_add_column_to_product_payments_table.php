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
            $table->tinyInteger('sent_mail_status')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_payments', function (Blueprint $table) {
            $table->dropColumn('sent_mail_status');
        });
    }
};
