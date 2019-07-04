@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.update',$product->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @include('backend.partials.message')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title"
                            value="{{$product->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" id="" rows="8" cols="80"
                            class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price"
                            value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter quantity"
                            value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as
                            $parent)
                            <option value="{{$parent->id}}" {{$product->category_id==$parent->id ? 'selected':''}}>
                                {{$parent->name}}</option>
                            @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get()
                            as $child)
                            <option value="{{$child->id}}" {{$product->category_id==$child->id ? 'selected':''}}>
                                ---->{{$child->name}}</option>
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select Brand</label>
                        <select name="brand_id" id="" class="form-control">
                            @foreach (App\Models\Brand::orderBy('name','asc')->get() as $brand)
                            <option value="{{$brand->id}}" {{$product->brand_id==$brand->id ? 'selected':''}}>
                                {{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="file" name="product_image[]" class="form-control"
                                    placeholder="Enter image">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="product_image[]" class="form-control"
                                    placeholder="Enter image">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="product_image[]" class="form-control"
                                    placeholder="Enter image">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="product_image[]" class="form-control"
                                    placeholder="Enter image">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="product_image[]" class="form-control"
                                    placeholder="Enter image">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
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