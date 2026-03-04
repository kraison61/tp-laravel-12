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
        Schema::create('image_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id')->index();
            $table->string('img_url');
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable();
            $table->string('location')->index();
            $table->date('worked_date');

            $table->index(['location', 'created_at'], 'image_uploads_location_created_index');
            $table->index(['service_id', 'created_at'], 'image_uploads_service_created_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_uploads');
    }
};
