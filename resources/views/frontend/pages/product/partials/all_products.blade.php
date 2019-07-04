<div class="row">
  @foreach($products as $product) @php $i=1;


  @endphp
  <div class="col-md-4">
    <div class="card">
      @foreach($product->images as $image) @if($i>0)
      <a href="{{route('product.slug',$product->slug)}}">
        <img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image)}}"
          alt="{{$product->title}}"></a>
      @endif
      @php $i=0;


      @endphp @endforeach
      <div class="card-body">

        <h4 class="card-title">
          <a href="{{route('product.slug',$product->slug)}}">{{$product->title}} </a>
        </h4>

        <p class="card-text">{{$product->price}} Tk.</p>
        @include('frontend.pages.product.partials.cart-button')
      </div>
    </div>
  </div>
  @endforeach

</div>
<div class="mt-4 pagination">
  {{$products->links()}}
</div>