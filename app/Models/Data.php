<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = ['merchant_code','name', 'phone', 'email','is_activated','email_otp','firm_name', 'pincode','state','dob','address','type','aadhar','pancard','pancardImg','aadharFimg','aadharBimg','voterID','voterFimg','voterBimg','driving','drivingFimg','drivingBimg'];
}
