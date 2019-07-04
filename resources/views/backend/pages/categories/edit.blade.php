@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Add categories
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
    @include('backend.partials.message')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description(Optional)</label>
                        <textarea name="description" id="" rows="8" cols="80" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Parent Category</label>
                        <select class="form-control" name="parent_id">
                          <option value="">Please select a primary category</option>
                       @foreach($main_categories as $cat)
                          <option value="{{$cat->id}}" {{$cat->id == $category->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
                          @endforeach
                       </select>


                    </div>
                    <div class="form-group">
                        <label for="category_image">Category Old Image</label><br>
                        <img src="{{asset('images/categories/'.$category->image)}}" width="150"><br>
                        <label for="category_image">Category New Image</label>
                          <div class="row">
                            <div class="col-md-4">
                                <input type="file" name="category_image" class="form-control" placeholder="Enter image">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update category</button>
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
