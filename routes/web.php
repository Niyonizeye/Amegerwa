<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  route for send a email
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'store'])->name('EmailSender');
// admin Routes for add photo 
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('add');
Route::post('/admin/add', [App\Http\Controllers\adminController::class, 'store'])->name('addphoto');

