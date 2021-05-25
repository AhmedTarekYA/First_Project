<?php

use App\Http\Controllers\UserController;
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


Route::get('/',[UserController::class,'index']);
Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit.user');
Route::post('/update/{id}',[UserController::class,'update'])->name('update.user');
Route::get('/add',[UserController::class,'add'])->name('add.user');
Route::post('/addNew',[UserController::class,'create'])->name('add.new.user');
Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete.user');

