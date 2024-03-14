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
        Schema::create('article_categories', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary;
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->uuid('parent_id')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('status')->default('DRAFT');
            $table->string('folder')->nullable();
            $table->integer('order')->unsigned()->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_categories');
    }
};
