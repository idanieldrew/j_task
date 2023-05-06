<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::post('', [UserController::class, 'store'])->name('user.store');
});


Route::prefix('banks')->group(function () {
    Route::post('', [BankController::class, 'store'])->name('bank.store');
    Route::get('balance/{bank:slug}', [BankController::class, 'show'])->middleware('auth:sanctum')->name('bank.show');
});
