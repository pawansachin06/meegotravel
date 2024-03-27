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
            $table->uuid('id')->unique()->primary;
            $table->string('status')->default('draft');
            $table->decimal('subtotal_price', 8, 2)->unsigned()->default(0);
            $table->decimal('total_price', 8, 2)->unsigned()->default(0);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('session_id');
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_phone')->nullable();
            $table->boolean('cart_cleared')->default(false);
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
