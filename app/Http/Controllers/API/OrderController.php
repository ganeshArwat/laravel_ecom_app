<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $order = Order::create([
            'seller_id'  => Auth::id(),
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'status'     => 'pending', // default status
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Order placed successfully.',
            'order'   => $order,
        ]);
    }
}
