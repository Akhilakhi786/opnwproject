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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // Employee Basic Info
            $table->string('employee_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Job Details
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->date('joining_date')->nullable();

            // Personal Details
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('pan')->nullable();
            $table->string('emergency_contact')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};