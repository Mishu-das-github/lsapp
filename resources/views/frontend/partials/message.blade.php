@if (count($errors)>1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@elseif(count($errors)==1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger" style="text-align:center">
                {{session('errors')}}
            </div>
        </div>
    </div>
</div>
@endif




@if(session('errorsnew'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger" style="text-align:center">
                {{session('errorsnew')}}
            </div>
        </div>
    </div>
</div>
@endif



@if(Session::has('success'))
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                <p>{{Session::get('success')}}</p>
            </div>
        </div>
    </div>
</div>
@endif