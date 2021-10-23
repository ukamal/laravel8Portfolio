@extends('admin.master')
@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="card-header">
                                Update Brand
                              </div>
                             
                            <form action="{{route('update-brand',$brands->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                              <div class="mb-3">
                                <input type="name" name="brand_name" class="form-control" id="brand_name" 
                                aria-describedby="brand_name" value="{{$brands->brand_name}}">
                              </div>
                              @error('brand_name')
                                  <span style="color: red">{{$message}}</span>
                              @enderror
                              <div class="form-group">
                                  <div class="md-3">
                                      <input type="file" name="brand_image" value="{{$brands->brand_image}}">
                                  </div>
                              </div>
                              <div class="form-group m-1">
                                  <img src="{{ asset($brands->brand_image)}}" alt="img">
                              </div>
                              @error('brand_image')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                              <button type="submit" class="btn btn-primary mb-1">Update Brand</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

        
@endsection
