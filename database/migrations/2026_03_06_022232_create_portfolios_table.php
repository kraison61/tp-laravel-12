<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique(); // ห้ามซ้ำกัน ไว้ทำ URL
            $table->string('location')->nullable();
            $table->decimal('project_length', 8, 2)->nullable();

            $table->longText('content')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('completion_date')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};
