@extends('admin.master')
@section('content')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Password Change</h2>
    </div>
    <div class="card-body">
        <form class="form-pill" method="post" action="{{ route('password-update') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input class="form-control" name="oldpassword" id="current_password" type="password" placeholder="Enter Email">
                @error('oldpassword')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Password">
                @error('password_confirmation')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                 <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection