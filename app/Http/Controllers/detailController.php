<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class detailController extends Controller
{
    public function index(Request $request, Product $product){
        return view('detail', ['product' => $product]);
    }
}
