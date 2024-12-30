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
        if (!Schema::hasTable('garbage_collections')) {
            Schema::create('garbage_collections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('household_id')->constrained('houses'); // Ensure the correct table name
                $table->enum('garbage_type', ['wet', 'dry', 'both']);
                $table->string('photo');
                $table->string('geo_location');
                $table->timestamp('collected_at');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garbage_collections');
    }
};
