@extends('frontend.layouts.master')
@section('content')
<div class="container margin-top-20">
    <div class="card card-body">
        <h2>Confirm Items</h2>
        <hr>
        <div class="row">
            <div class="col-md-7 border-right">
                @foreach (App\Models\Cart::totalCarts() as $cart)
                <p>{{$cart->product->title}}-
                    <strong>{{$cart->product->price}} taka</strong>-
                    {{$cart->product_quantity}} items
                </p>
                @endforeach
            </div>
            <div class="col-md-5">
                @php
                $total_price=0;
                @endphp
                @foreach (App\Models\Cart::totalCarts() as $cart)
                @php
                $total_price+=$cart->product->price*$cart->product_quantity;
                @endphp
                @endforeach
                <p>Total price: <strong>{{$total_price}}</strong> taka</p>
                <p>Total price with shipping cost:
                    <strong>{{$total_price + App\Models\Setting::first()->shipping_cost}}</strong> taka</p>
            </div>
        </div>
        <p><a href="{{route('carts')}}">Change cart items</a></p>
    </div>
    <div class="card card-body mt-2">
        <h2>Shipping Address</h2>
        <form method="POST" action="{{ route('checkouts.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name"
                        value="{{Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required
                        autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                <div class="col-md-6">
                    <input id="phone_no" type="text"
                        class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no"
                        value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                    @if ($errors->has('phone_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="Message"
                    class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (Optional)') }}</label>

                <div class="col-md-6">
                    <textarea rows="4" id="message" type="text"
                        class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                        name="message"></textarea>

                    @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="shipping_address"
                    class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (*)') }}</label>

                <div class="col-md-6">
                    <textarea rows="4" id="shipping_address" type="text"
                        class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}"
                        name="shipping_address"
                        required>{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                    @if ($errors->has('shipping_address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('shipping_address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="payment_method"
                    class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                <div class="col-md-6">
                    <select name="payment_method" class="form-control" id="payments" required>
                        <option value="">Select a payment method please</option>
                        @foreach ($payments as $payment)
                        <option value="{{$payment->short_name}}">{{$payment->name}}</option>
                        @endforeach
                    </select>

                    {{-- This will be displayed after clicking payment method --}}
                    @foreach ($payments as $payment)
                    @if($payment->short_name=='cash_in')
                    <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center hidden mt-2">
                        <h3>
                            For Cash In, There is nothing necessary. Just Click finish order.
                        </h3>
                        <small>
                            You will get your product within two or three business days.
                        </small>
                    </div>
                    @else
                    <div id="payment_{{$payment->short_name}}" class="alert alert-success mt-2 text-center hidden">
                        <h3>{{$payment->name}} Payment</h3>
                        <p>
                            <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                        </p>
                        <strong>Account Type: {{$payment->type}}</strong>
                        <div class="alert alert-success">
                            Please send money to the above Bkash No and write the transaction code below there.
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="alert alert-success mt-0 text-center hidden" id="transaction_id">
                        <input type="text" name="transaction_id" class="form-control" id="transaction_id"
                            placeholder="Enter Transaction ID">
                    </div>

                    {{-- This will be displayed after clicking payment method --}}


                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Order Now') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
    $("#payments").change(function(){
        $payment_method=$("#payments").val();
        if($payment_method == "cash_in")
        {
            $("#payment_cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").addClass('hidden');




        }
        else if($payment_method =="bkash")
        {
            $("#payment_bkash").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").removeClass('hidden');



        }
        else if($payment_method == "rocket")
        {
            $("#payment_rocket").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');

        }
})
</script>
@endsection