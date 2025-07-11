<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Carbon;
use App\Models\Seller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class SellerAuthController extends Controller
{
    // 🔹 Register Seller and Send Verification Email
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Send email verification
        $seller->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Seller registered successfully. Please verify your email.',
        ]);
    }

    // 🔹 Verify Email
    public function verify(Request $request, $id, $hash)
    {
        $seller = Seller::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($seller->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link.'], 400);
        }

        if ($seller->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.']);
        }

        $seller->markEmailAsVerified();

        event(new Verified($seller));

        return response()->json(['message' => 'Email verified successfully.']);
    }

    // 🔹 Login Seller (only if email is verified)
    public function login(Request $request)
    {
        $seller = Seller::where('email', $request->email)->first();

        if (!$seller || !Hash::check($request->password, $seller->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        if (!$seller->hasVerifiedEmail()) {
            return response()->json(['message' => 'Please verify your email before logging in.'], 403);
        }

        $token = $seller->createToken('seller-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'token' => $token,
            'seller' => $seller
        ]);
    }

    // 🔹 Logout Seller
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully.']);
    }

    public function viewProducts()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Products fetched successfully.',
            'data' => $products
        ]);
    }
}
