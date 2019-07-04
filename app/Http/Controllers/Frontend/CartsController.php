<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.carts');
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
        session()->flash('success', 'Product has added to cart!!');
        return back();
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
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        } else {
            return redirect()->route('index');
        }

        session()->flash('success', 'Cart item has updated successfully!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();
        } else {
            return redirect()->route('index');
        }
        session()->flash('success', 'Cart has deleted successfully!!');
        return back();
    }
}
