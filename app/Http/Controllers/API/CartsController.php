<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
        ], [
            'product_id.required' => 'Please give a product',
        ]);
        //Check if the product exists in database whether user is logged in or not
        if (Auth::check()) {
            $cart = Cart::Where('user_id', Auth::id())
                ->where('order_id', null)
                ->where('product_id', $request->product_id)
                ->first();
        } else {
            $cart = Cart::Where('ip_address', request()->ip())
                ->where('order_id', null)
                ->where('product_id', $request->product_id)
                ->first();
        }
        //If the product exists
        if (!is_null($cart)) {
            $cart->increment('product_quantity');
        } else {
            $cart = new Cart();
            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();

        }
        return json_encode(['status' => 'success', 'message' => 'Item has added to cart', 'totalItems' => Cart::totalItems()]);
    }
}
