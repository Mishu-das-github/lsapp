<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>
<script>
    //This is used for avoiding 419 unknown status error
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
    function addToCart(product_id)
    {
        $.post( "http://lsapp.build/api/carts/store",
                {
                product_id: product_id
              })
            .done(function( data ) {
                data=JSON.parse(data)
                if(data.status=='success')
                {
                    //toast
                    alertify.set('notifier','position', 'top-center');
                    alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems + '<br> To checkout, <a href="{{route('carts')}}">Goto Checkout Page</a>');
                    $("#totalItems").html(data.totalItems);

                }
  });
    }
</script>