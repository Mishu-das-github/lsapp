@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Manage divisions
            </div>
            <div class="card-body">
                @include('backend.partials.message')
                <table class="table table-hover table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Division name</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisions as $division)
                        <tr>
                            <td>#</td>
                            <td>{{$division->name}}</td>
                            <td>{{$division->priority}}</td>
                            <td>
                                <a href="{{route('admin.division.edit',$division->id)}}"
                                    class="btn btn-success">Edit</a>
                                <a href="#deleteModal{{$division->id}}" data-toggle="modal"
                                    class="btn btn-danger">Delete</a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to
                                                    delete
                                                    {{$division->name}}?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.division.delete',$division->id)}}"
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
                            <th>Division name</th>
                            <th>Priority</th>
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