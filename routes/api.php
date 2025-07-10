<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SellerAuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('seller')->group(function () {
    Route::post('/register', [SellerAuthController::class, 'register']);
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->middleware('auth:seller');

    Route::get('/verify-email/{id}/{hash}', [SellerAuthController::class, 'verify'])->name('seller.verify');
    Route::get('/seller/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.']);
        }
    
        if ($request->user()->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified($request->user()));
        }
    
        return response()->json(['message' => 'Email verified successfully.']);
    })->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
