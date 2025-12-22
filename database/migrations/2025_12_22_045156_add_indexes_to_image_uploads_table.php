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
        Schema::table('image_uploads', function (Blueprint $table) {
            //
            $table->index('service_id', 'image_uploads_service_id_index');
            $table->index('created_at', 'image_uploads_created_at_index');
            $table->index('location', 'image_uploads_location_index');

            $table->index(['service_id', 'created_at'], 'image_uploads_service_created_index');
            $table->index(['location', 'created_at'], 'image_uploads_location_created_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('image_uploads', function (Blueprint $table) {
            //
            $table->dropIndex('image_uploads_service_id_index');
            $table->dropIndex('image_uploads_created_at_index');
            $table->dropIndex('image_uploads_location_index');
            $table->dropIndex('image_uploads_service_created_index');
            $table->dropIndex('image_uploads_location_created_index');
        });
    }
};
