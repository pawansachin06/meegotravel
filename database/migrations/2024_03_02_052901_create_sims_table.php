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
        Schema::create('sims', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary;
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->default('');
            $table->string('company')->default('');
            $table->string('validity')->default(365)->comment('Validity in days');
            $table->string('data')->default('1 GB');
            $table->decimal('price', 8, 2)->unsigned()->default(0.00);
            $table->string('status')->default('draft');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};
