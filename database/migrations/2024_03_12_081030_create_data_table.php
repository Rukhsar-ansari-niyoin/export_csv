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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_code')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('firm_name')->nullable();
            $table->string('pincode')->nullable();
            $table->boolean('is_activated')->default(0);
            $table->boolean('mobile_is_activated')->default(0);
            $table->integer('email_otp')->nullable();
            $table->integer('mobile_otp')->nullable();      
            $table->string('state')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('pancard')->nullable();
            $table->string('pancardImg')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('aadharFimg')->nullable();
            $table->string('aadharBimg')->nullable();
            $table->string('voterID')->nullable();
            $table->string('voterFimg')->nullable();
            $table->string('voterBimg')->nullable();
            $table->string('driving')->nullable();
            $table->string('drivingFimg')->nullable();
            $table->string('drivingBimg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
