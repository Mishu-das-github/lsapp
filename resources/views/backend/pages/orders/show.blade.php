@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                View Order #LE{{$order->id}}
            </div>
            <div class="card-body">
                @include('backend.partials.message')
                <div class="row">
                    <div class="col-md-6 border-right">
                        <p><strong>Orderer Name:</strong> {{$order->name}}</p>
                        <p><strong>Orderer Phone:</strong> {{$order->phone_no}}</p>
                        <p><strong>Orderer Email:</strong> {{$order->email}}</p>
                        <p><strong>Orderer Shipping Address:</strong> {{$order->shipping_address}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Order Payment Method:</strong> {{$order->payment->name}}</p>
                        <p><strong>Order Payment Transaction:</strong> {{$order->transaction_id}}</p>

                    </div>
                </div>
                <hr>
                <h3>Ordered Items:</h3>
                @if($order->carts->count() >0)
                <table class="table table-bordered table-stripe" id="dataTable">
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
                        @foreach ($order->carts as $cart)

                        <tr>
                            <td>
                                {{ $loop->index + 1}}
                            </td>
                            <td>
                                <a href="{{route('product.slug',$cart->product->slug)}}">{{$cart->product->title}}</a>
                            </td>
                            <td>
                                @if($cart->product->images->count()>0)
                                <img src="{{asset('images/products/'.$cart->product->images->first()->image)}}"
                                    width="60px">
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
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Product Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub-total Price</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>


                @endif

                <hr>
                <form method="post" style="display:inline-block!important"
                    action="{{route('admin.order.charge',$order->id)}}">
                    @csrf
                    <label for="">Shipping Charge</label>
                    <input type="number" value="{{$order->shipping_charge}}" class="form-control" name="shipping_charge"
                        id="shipping_charge">
                    <label for="">Custom Discount</label>
                    <input type="number" value="{{$order->custom_discount}}" class="form-control" name="custom_discount"
                        id="custom_discount">
                    <input type="submit" value="Update" class="btn btn-success">
                    <a href="{{route('admin.order.invoice',$order->id)}}" class="ml-2 btn btn-info">Generate Invoice</a>
                </form>
                <hr>
                <form method="post" style="display:inline-block!important"
                    action="{{route('admin.order.completed',$order->id)}}">
                    @csrf
                    @if($order->is_completed)
                    <input type="submit" value="Cancel Order" class="btn btn-danger">
                    @else
                    <input type="submit" value="Complete Order" class="btn btn-success">
                    @endif
                </form>
                <form method="post" style="display:inline-block!important"
                    action="{{route('admin.order.paid',$order->id)}}">
                    @csrf
                    @if($order->is_paid)
                    <input type="submit" value="Cancel Payment" class="btn btn-danger">
                    @else
                    <input type="submit" value="Complete Payment" class="btn btn-success">
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                <i class="mdi mdi-heart text-danger"></i>
            </span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
@endsection