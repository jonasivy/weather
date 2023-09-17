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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->string('openweather_code')->unique();
            $table->string('name');
            $table->decimal('lon', 16, 8);
            $table->decimal('lat', 16, 8);
            $table->unsignedInteger('population')->default(0);
            $table->timestamp('sunrise')->nullable();
            $table->timestamp('sunset')->nullable();
            $table->timestamps();

            $table->unique([
                'country_id',
                'openweather_code',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
