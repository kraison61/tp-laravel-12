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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_category_id');
            $table->string('title');
            $table->string('description');
            $table->string('h1');
            $table->string('top_1');
            $table->string('top_2');
            $table->longText('content_1');
            $table->longText('content_2');
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->timestamps();
            $table->string('top_alt')->nullable();
            $table->string('bottom_alt')->nullable();
            $table->decimal('rating_value', 3)->default(5);
            $table->integer('review_count')->default(0);
            $table->string('schema_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
