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
        Schema::table('cars', function (Blueprint $table) {
            $table->enum('fuel_type', ['bensin', 'diesel', 'listrik'])
                ->default('bensin')
                ->after('status');
            $table->unsignedTinyInteger('seats')
                ->default(4)
                ->after('fuel_type');
            $table->enum('transmission', ['manual', 'automatic'])
                ->default('manual')
                ->after('seats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['fuel_type', 'seats', 'transmission']);
        });
    }
};
