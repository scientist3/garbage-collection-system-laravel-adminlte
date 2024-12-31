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
        Schema::create("dustbin_types", function (Blueprint $table) {
            $table->id("id");
            $table->string("name");
            // $table->timestamps();
        });

        Schema::create('dustbins', function (Blueprint $table) {
            $table->id('id');
            $table->string('dustbin_code')->unique();
            $table->foreignId('dustbin_type_id')->references('id')->on('dustbin_types')->onDelete('cascade')->onUpdate('cascade'); //, ['Dry', 'Wet']
            $table->foreignId('houses_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('geo_coordinates'); // For storing latitude and longitude as a point
            $table->timestamps();
        });


        Schema::create('pickup_records', function (Blueprint $table) {
            $table->id();
            $table->string('dustbin_code');
            $table->foreign('dustbin_code')->references('dustbin_code')->on('dustbins')->onDelete('cascade')->onUpdate('cascade');
            $table->string('photo');
            $table->timestamp('pickup_datetime')->useCurrent();
            $table->enum('status', ['Pending', 'Completed', 'Missed']);
            $table->foreignId('scanned_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('geo_coordinates'); // For storing latitude and longitude as a point
            $table->enum('pickup_method', ['Manual', 'Automated']);
            $table->text('remarks')->nullable();
            $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_records');
        Schema::dropIfExists('dustbins');
        Schema::dropIfExists('dustbin_types');
    }
};
