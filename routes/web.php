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
Route::get('/edit/{id}', [DataController::class, 'fetchDataById'])->name('edit');
Route::post('update/{id}', [DataController::class, 'edit'])->name('update');

Route::get('/delete/{id}', [DataController::class, 'delete'])->name('delete');

Route::post('verify_details', [DataController::class, 'verify_details'])->name('verify_details');
Route::get('/verify_details', function () {
    return view('verify_details');
});
Route::get('/form_success',[DataController::class,"form_success"])->name('form_success');
require __DIR__.'/auth.php';

