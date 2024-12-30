<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        // Districts Table
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('name', 255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tehsils Table
        Schema::create('tehsils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('district_id');
            $table->string('name', 255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
        });

        // Panchayats Table
        Schema::create('panchayats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tehsil_id');
            $table->string('name', 255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tehsil_id')->references('id')->on('tehsils')->onDelete('cascade')->onUpdate('cascade');
        });

        // Wards Table
        Schema::create('wards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('panchayat_id');
            $table->string('name', 255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('panchayat_id')->references('id')->on('panchayats')->onDelete('cascade')->onUpdate('cascade');
        });

        // Villages Table
        // Schema::create('villages', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('ward_id')->nullable()->constrained('wards')->onDelete('cascade')->onUpdate('cascade');
        //     $table->string('name', 255);
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    public function down()
    {
        // Schema::dropIfExists('villages');
        Schema::dropIfExists('wards');
        Schema::dropIfExists('panchayats');
        Schema::dropIfExists('tehsils');
        Schema::dropIfExists('districts');
    }
}
