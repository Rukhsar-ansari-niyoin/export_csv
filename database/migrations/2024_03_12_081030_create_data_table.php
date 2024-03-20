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
            $table->string('merchant_code');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('firm_name');
            $table->string('pincode');
            $table->boolean('is_activated')->default(0);
            $table->integer('email_otp')->nullable();
            $table->string('state');
            $table->date('dob');
            $table->string('address');
            $table->string('type');
            $table->string('pancard');
            $table->string('pancardImg');
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
