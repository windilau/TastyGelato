<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GelatoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\UserController;
use App\Models\Minuman;

// Landing Page
Route::get('/', [LandingPageController::class, 'index']);

// Login Page
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.action');

// Register Page
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register.action');
// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// // Index Admin After Login
Route::get('/index', [IndexController::class, 'index'])->middleware('auth');

// Add, Edit, Delete Gelato 
Route::GET('/gelato-add',[GelatoController::class,'create'])->middleware('auth');
Route::POST('/gelato-add',[GelatoController::class,'store'])->middleware('auth');

Route::GET('/gelato-edit/edit/{id}',[GelatoController::class,'edit'])->middleware('auth');
Route::PUT('/gelato-edit/{id}',[GelatoController::class,'update'])->middleware('auth');

Route::DELETE('/gelato-delete/{id}',[GelatoController::class,'destroy'])->middleware('auth');

// Add, Edit, Delete Minuman
Route::GET('/minuman-add',[MinumanController::class,'create'])->middleware('auth');
Route::POST('/minuman-add',[MinumanController::class,'store'])->middleware('auth');

Route::GET('/minuman-edit/edit/{id}',[MinumanController::class,'edit'])->middleware('auth');
Route::PUT('/minuman-edit/{id}',[MinumanController::class,'update'])->middleware('auth');

Route::DELETE('/minuman-delete/{id}',[MinumanController::class,'destroy'])->middleware('auth');
