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
        Schema::create('pickup_records', function (Blueprint $table) {
            $table->id();
            $table->string('dustbin_code');
            $table->foreign('dustbin_code')->references('dustbin_code')->on('dustbins')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('pickup_datetime')->useCurrent();
            $table->enum('status', ['Pending', 'Completed', 'Missed']);
            $table->foreignId('scanned_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('geo_coordinates'); // For storing latitude and longitude as a point
            $table->enum('segregation_option', ['segregated', 'non_segregated']);
            $table->json('segregation_types')->nullable(); // To store the segregation types as JSON
            $table->text('remarks')->nullable();
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        // Schema::create('pickup_records', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('dustbin_code');
        //     $table->foreign('dustbin_code')->references('dustbin_code')->on('dustbins')->onDelete('cascade')->onUpdate('cascade');
        //     // $table->string('photo');
        //     $table->timestamp('pickup_datetime')->useCurrent();
        //     $table->enum('status', ['Pending', 'Completed', 'Missed']);
        //     $table->foreignId('scanned_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->string('geo_coordinates'); // For storing latitude and longitude as a point
        //     // $table->enum('pickup_method', ['Manual', 'Automated']);
        //     $table->text('remarks')->nullable();
        //     $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_records');
    }
};
