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
                          <thead>
                            <tr>
                              <th scope="col">SL.</th>
                              <th scope="col">Contact Name</th>
                              <th scope="col">Conatact Email</th>
                              <th scope="col">Contact Subject</th>
                              <th scope="col">Contact Message</th>
                              <th scope="col">Knock Me</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($contactforms as $key => $contac)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contac->name }}</td>
                                <td>{{ $contac->email }}</td>
                                <td>{{ $contac->subject }}</td>
                                <td>{{ $contac->message }}</td>
                                <td>
                                    {{$contac['created_at']->diffForHumans() }}   
                                </td>
                                <td>
                                    <a href="{{ route('delete-contact-form',$contac->id) }}" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</a>
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