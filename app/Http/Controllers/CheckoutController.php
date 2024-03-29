<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shops.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug. ' , ' . $item->qty;
        })->values()->toJson();



        try {
            $stripe  = new Stripe('sk_test_NLnzZujPURqXuiPp6jdfpfkF00kuONWux9');
            $charge = $stripe->charges()->create([
                'amount'  => Cart::total(),
                'currency' => 'USD',
                'source'    => $request->stripeToken,
                'description'  => 'order',
                'receipt_email'  => $request->email,
                'metadata' => [
                        'contents' => $contents,
                        'quantity' =>  Cart::instance('default')->count()
                ],
            ]);

            Cart::instance('default')->destroy();
             return redirect()->route('thank.index')->with('success-msg', 'Thank you for order');

        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' .  $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
