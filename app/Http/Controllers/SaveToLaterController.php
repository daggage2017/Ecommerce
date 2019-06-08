<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class SaveToLaterController extends Controller
{

    public function destroy($id)
    {

        Cart::instance('saveToLater')->remove($id);
        return redirect()->back()->with('msg', 'Item has been Removed');
    }


    public function switchMoveToCart($id)
    {
        $item = Cart::instance('saveToLater')->get($id);
        Cart::instance('saveToLater')->remove($id);

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect(route('cart.index'))->with('msg', 'item moved to cart');

    }
}
