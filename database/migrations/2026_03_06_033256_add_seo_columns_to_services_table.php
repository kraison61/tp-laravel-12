<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('services', function (Blueprint $table) {
        if (!Schema::hasColumn('services', 'is_active')) {
            $table->boolean('is_active')->default(true);
        }

        if (!Schema::hasColumn('services', 'schema_type')) {
            $table->string('schema_type', 50)->default('Service');
        }
    });
}

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['is_active','schema_type']);
        });
    }
};
