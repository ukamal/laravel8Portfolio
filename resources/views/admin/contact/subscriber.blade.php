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
                              <th scope="col">Conatact Email</th>
                              <th scope="col">Subscription Date</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($subcriber as $key => $sub)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $sub->email }}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($sub['created_at'])->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('delete-subscribe',$sub->id) }}" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</a>
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