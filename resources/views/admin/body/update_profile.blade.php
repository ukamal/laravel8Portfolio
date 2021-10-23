@extends('admin.master')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Password Change</h2>
    </div>
    @if(session('success'))
        <strong style="color: blue">{{ session('success') }}</strong>
    @endif
    <div class="card-body">
        <form class="form-pill" method="post" action="{{ route('admin-profile-update') }}">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" 
                    value="{{ $user['name'] }}">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email"
                    value="{{ $user['email'] }}">
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection