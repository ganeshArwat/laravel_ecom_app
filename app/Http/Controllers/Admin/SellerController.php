<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::latest()->paginate(10);
        return view('admin.sellers.index', compact('sellers'));
    }
}
