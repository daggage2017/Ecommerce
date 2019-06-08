<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function index() {
        $products = Product::inRandomOrder()->take(8)->get();
         return view('loading', compact('products'));
    }
}
