<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $likes = Product::inRandomOrder()->take(4)->get();
        return view('cart', compact('likes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $dublacte = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($dublacte->isNotEmpty()) {
            return  redirect(route('cart.index'))->with('error', 'This Item Already in cart!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect(route('cart.index'))->with('msg', 'item add to cart');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('msg', 'Item has been Removed');
    }

    public function saveToLater($id)
    {

       $item = Cart::get($id);
       Cart::remove($id);

        $duplcate = Cart::instance('saveToLater')->search(function ($cartItem, $rowId) use ($id)  {
            return $rowId === $id;
        });
        if ($duplcate->isNotEmpty()) {
            return  redirect(route('cart.index'))->with('error', 'This Item Already save for later!');
        }

        Cart::instance('saveToLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect(route('cart.index'))->with('msg', 'item add to save to later');

    }
}
