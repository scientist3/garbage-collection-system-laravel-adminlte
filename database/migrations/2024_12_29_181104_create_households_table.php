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
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Adding foreign key references for State, City, District, Tehsil, Panchayat, Ward
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('tehsil_id');
            $table->unsignedBigInteger('panchayat_id');
            $table->unsignedBigInteger('ward_id');

            // House-specific fields
            $table->string('village');
            $table->string('house_owner_name');
            $table->string('parentage');
            $table->string('phone_no');
            $table->string('location');
            $table->string('wet_garbage_qr');
            $table->string('dry_garbage_qr');

            $table->timestamps();

            // Setting up foreign key constraints
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('tehsil_id')->references('id')->on('tehsils')->onDelete('cascade');
            $table->foreign('panchayat_id')->references('id')->on('panchayats')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
