@extends('frontend.pages.users.master')
@section('sub-content')
<div class="container">
    <h3>Welcome {{$user->first_name.' '.$user->last_name}}</h3>
    <p>You can change your profile and all informations here...</p>

    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body mt-2 pointer" onclick="location.href='{{route('user.profile')}}'">
                <h3> Update Profile</h3>
            </div>
        </div>
    </div>
</div>
@endsection