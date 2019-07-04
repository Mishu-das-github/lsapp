@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Manage sliders
            </div>
            <div class="card-body">
                @include('backend.partials.message')
                <a href="#addNewSlider" data-toggle="modal" class="btn btn-info float-right mb-2">Add New Slider</a>
                <!-- Add Modal -->
                <div class="modal fade" id="addNewSlider" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.slider.store')}}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">Slider Title <small
                                                class="text-danger">(Required)</small></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Slider Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Slider Image <small
                                                class="text-danger">(Required)</small></label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Slider Image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Slider Button Text <small
                                                class="text-info">(Optional)</small></label>
                                        <input type="text" class="form-control" name="button_text" id="button_text"
                                            placeholder="Slider Button Text (If need)">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Slider Button Link <small
                                                class="text-info">(Optional)</small></label>
                                        <input type="text" class="form-control" name="button_link" id="button_link"
                                            placeholder="Slider Button Link (If need)">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Slider Priority <small
                                                class="text-danger">(Required)</small></label>
                                        <input type="number" class="form-control" name="priority" id="priority"
                                            placeholder="Slider Priority; e.g:10" value="10" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add New</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Slider Title</th>
                            <th>Slider Image</th>
                            <th>Slider Priority</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$slider->title}}</td>
                            <td>
                                <img src="{{asset('images/sliders/'.$slider->image)}}" width="150">
                            </td>
                            <td>{{$slider->priority}}</td>
                            <td>
                                <a href="#updateSlider{{$slider->id}}" data-toggle="modal"
                                    class="btn btn-success">Edit</a>
                                <!-- Update Slider Modal -->
                                <div class="modal fade" id="updateSlider{{$slider->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Slider</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.slider.update',$slider->id)}}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="title">Slider Title <small
                                                                class="text-danger">(Required)</small></label>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                            placeholder="Slider Title" value="{{$slider->title}}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Slider Image</label>
                                                        <a href="{{asset('images/sliders/'.$slider->image)}}"
                                                            target="_blank">Previous Image</a>
                                                        <input type="file" class="form-control" name="image" id="image"
                                                            placeholder="Slider Image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Slider Button Text <small
                                                                class="text-info">(Optional)</small></label>
                                                        <input type="text" class="form-control" name="button_text"
                                                            id="button_text" value="{{$slider->button_text}}"
                                                            placeholder="Slider Button Text (If need)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Slider Button Link <small
                                                                class="text-info">(Optional)</small></label>
                                                        <input type="text" class="form-control" name="button_link"
                                                            id="button_link" value="{{$slider->button_link}}"
                                                            placeholder="Slider Button Link (If need)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Slider Priority <small
                                                                class="text-danger">(Required)</small></label>
                                                        <input type="number" class="form-control" name="priority"
                                                            id="priority" placeholder="Slider Priority; e.g:10"
                                                            value="{{$slider->priority}}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#deleteModal{{$slider->id}}" data-toggle="modal"
                                    class="btn btn-danger">Delete</a>


                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to
                                                    delete
                                                    {{$slider->title}}?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.slider.delete',$slider->id)}}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">Parmanent
                                                        Delete</button>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Slider Title</th>
                            <th>Slider Image</th>
                            <th>Slider Priority</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>
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