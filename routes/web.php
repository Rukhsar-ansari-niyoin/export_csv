<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use Faker\Guesser\Name;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::post('FormSubmit',[DataController::class,"insert"])->name('FormSubmit');
Route::get('fetchList',[DataController::class,"fetchList"])->name('fetchList');

Route::get('/export', [DataController::class,"export"])->name('export');
Route::post('import', [DataController::class,'import'])->name('import');
Route::get('/edit/{id}', [DataController::class, 'fetchDataById'])->name('edit');
Route::post('update/{id}', [DataController::class, 'edit'])->name('update');

Route::get('/delete/{id}', [DataController::class, 'delete'])->name('delete');

Route::post('verify_details', [DataController::class, 'verify_details'])->name('verify_details');
Route::post('mobile_verify_details', [DataController::class, 'mobile_verify_details'])->name('mobile_verify_details');

Route::post('emailOtp', [DataController::class, 'emailOtp'])->name('emailOtp');
Route::post('mobileOtp', [DataController::class, 'mobileOtp'])->name('mobileOtp');

Route::get('/form2', [DataController::class,"form2"])->name('form2');
Route::get('/form4', [DataController::class,"form4"])->name('form4');
Route::get('/verify_details', function () {
    return view('verify_details');
});
Route::get('/mobile_verify_details', function () {
    return view('mobile_verify_details');
});
Route::get('/form_success',[DataController::class,"form_success"])->name('form_success');
require __DIR__.'/auth.php';

Route::get('/sms', [DataController::class,"TwilioSMS"])->name('TwilioSMS');

Route::get('inactive_users',[DataController::class,"inactive_users"])->name('inactive.users');
Route::get('inactive_users_data',[DataController::class,"inactive_users_data"])->name('inactive_users_data');
Route::get('verfication_form',[DataController::class,"verfication_form"])->name('verfication_form');
Route::post('verificationFormSubmit',[DataController::class,"verificationFormSubmit"])->name('verificationFormSubmit');


