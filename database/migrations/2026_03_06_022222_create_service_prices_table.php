<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');

            $table->string('name'); // เช่น "กำแพงกันดิน 1.5ม."
            $table->string('spec_description')->nullable();

            // ชนิดราคา (บังคับใช้เพื่อทำ Schema SEO)
            $table->enum('price_type', ['fixed', 'starting_at', 'range', 'call_to_ask'])->default('fixed');

            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('max_price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->string('price_currency', 3)->default('THB');
            $table->string('unit', 50)->nullable();
            $table->string('unit_code', 10)->nullable(); // เช่น MTR, MTK

            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_prices');
    }
};
