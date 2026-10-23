<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('unit', 32)->default('kg');
            $table->string('city')->nullable()->index();
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->integer('stock')->unsigned()->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
            $table->index(['price']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
