<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Order;
use Auth;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts',compact('payments'));
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
        'name'=>'required',
        'phone_no'=>'required',
        'shipping_address'=>'required',
        'payment_method'=>'required'
        ]);
        //Check transaction ID has been given or not
        $order=new Order();
        if($request->payment_method!="cash_in")
        {
        if($request->transaction_id==NULL||empty($request->transaction_id))
        {
            session()->flash('errorsnew','Please provide Transaction ID for your payment');
            return back();
        }
        else
        {
            $order->transaction_id=$request->transaction_id;
        }
        }
      
        $order->name=$request->name;
        $order->email=$request->email;
        $order->ip_address=request()->ip();
        $order->phone_no=$request->phone_no;
        $order->shipping_address=$request->shipping_address;
        $order->message=$request->message;
        if(Auth::check())
        {
            $order->user_id=Auth::id();
        }

        $order->payment_id=Payment::where('short_name',$request->payment_method)->first()->id;
        $order->save();
        foreach(Cart::totalCarts() as $cart)
        {
            $cart->order_id=$order->id;
            $cart->save();
        }
        session()->flash('success','Your order has taken successfully! Please wait! Admin will soon confirm it!');
        return redirect()->route('index');

    }

}
