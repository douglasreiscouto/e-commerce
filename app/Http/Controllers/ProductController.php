<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('store.products.show', compact('product'));
    }
}