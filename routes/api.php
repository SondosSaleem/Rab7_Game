<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
// ✅ استرجاع بيانات المستخدم بعد تسجيل الدخول
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ مثال على إضافة مسارات الـ API الخاصة بالمستخدمين
Route::controller(UserController::class)->group(function(){
    Route::post('register',  'register');   
    Route::post('login',  'login');       
    
});

// ✅ مثال على إضافة مسارات الملف الشخصي
Route::middleware('auth:sanctum')->prefix('profile')->controller(App\Http\Controllers\ProfileController::class)->group(function(){
    Route::get('/', 'index');     
    Route::post('/', 'store');    
    Route::put('/{id}', 'update');
    Route::get('/{id}', 'show');  
});
