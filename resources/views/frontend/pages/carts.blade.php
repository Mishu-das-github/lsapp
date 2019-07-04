@extends('frontend.layouts.master')
@section('content')
<div class="container margin-top-20">
    <h2>My Cart Items </h2>
    @if(App\Models\Cart::totalItems() >0)
    <table class="table table-bordered table-stripe">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Sub-total Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total_price=0;
            @endphp
            @foreach (App\Models\Cart::totalCarts() as $cart)

            <tr>
                <td>
                    {{ $loop->index + 1}}
                </td>
                <td>
                    <a href="{{route('product.slug',$cart->product->slug)}}">{{$cart->product->title}}</a>
                </td>
                <td>
                    @if($cart->product->images->count()>0)
                    <img src="{{asset('images/products/'.$cart->product->images->first()->image)}}" width="60px">
                    @endif
                </td>
                <td>
                    <form class=" form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
                        @csrf
                        <input type="number" name="product_quantity" class="form-control" id=""
                            value="{{$cart->product_quantity}}">
                        <button class="btn btn-success ml-2" type="submit">Update</button>
                    </form>
                </td>
                <td>{{$cart->product->price}} Taka</td>
                <td>
                    @php
                    $total_price+=$cart->product->price * $cart->product_quantity;
                    @endphp
                    {{$cart->product->price * $cart->product_quantity}} Taka</td>
                <td>
                    <form class="form-inline" action="{{route('carts.destroy',$cart->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach

            <tr>
                <td colspan="4"></td>
                <td>Total amount</td>
                <td><strong>{{$total_price}} Taka</strong></td>
            </tr>
        </tbody>
    </table>
    <div class="float-right">
        <a href="{{route('products')}}"><button class="btn btn-info btn-lg">Continue Shopping..</button></a>
        <a href="{{route('checkouts')}}"><button class="btn btn-warning btn-lg">Checkout</button></a>
    </div>

    @else
    <div class="alert alert-warning">
        <h5><strong>There is no item in your cart.</strong></h5><br>
        <a href="{{route('products')}}"><button class="btn btn-info btn-lg">Continue Shopping..</button></a>
    </div>


    @endif
</div>
@endsection