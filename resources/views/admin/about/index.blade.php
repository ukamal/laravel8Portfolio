@extends('admin.master')
@section('content')


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                         <div class="card-header">
                            <a href="{{ route('add-about') }}">about Add</a>
                          </div>
                          <thead>
                            <tr>
                              <th scope="col">SL.</th>
                              <th scope="col">Title</th>
                              <th scope="col">Short Description</th>
                              <th scope="col">Long Description</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($abouts as $key => $about)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->short_des }}</td>
                                <td>{{ $about->long_des }}</td>
                                <td>
                                    <a href="{{ route('edit-about',$about->id) }}" title="Edit" class="btn btn-info btn-sm"> Edit</a>
                                    <a href="{{ route('delete-about',$about->id) }}" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection