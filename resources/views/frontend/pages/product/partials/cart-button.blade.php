<form class="form-inline" action="{{route('carts.store')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="button" onclick="addToCart({{$product->id}})" class="btn btn-warning"><i class="fa fa-plus">Add to
            cart</i></button>
</form>