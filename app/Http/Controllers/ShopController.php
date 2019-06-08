<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        if (request()->category ) {
              $products = Product::with('categories')->whereHas('categories', function ($query) {
                  $query->where('slug', request()->category);
              });
              $categoryName = $categories->where('slug', request()->category)->first()->name;
        } else {
            $products = Product::where('feature', true);
            $categoryName = 'Features';
        }
        if (request()->sort == 'low-to-high') {
            $products = $products->orderBy('price')->paginate(9);
        }elseif (request()->sort == 'high-to-low') {
            $products = $products->orderBy('price', 'DESC')->paginate(9);
        } else {
           $products =  $products->paginate(9);
        }


        return view('shops.shop', compact('products', 'categories', 'categoryName'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $likes = Product::where('slug', '<>', $slug)->take(4)->get();
        return view('shops.product',compact('product', 'likes'));
    }





}
