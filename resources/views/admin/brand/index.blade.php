@extends('admin.master')
@section('content')
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                         
                             <div class="card-header">
                                Brand
                              </div>
                              <thead>
                                <tr>
                                  <th scope="col">SL.</th>
                                  <th scope="col">Brand Name</th>
                                  <th scope="col">Brand Image</th>
                                  <th scope="col">Created at</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($brands as $key => $brand)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" alt="img" width="80px" height="100px"></td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit-brand',$brand->id) }}" title="Edit" class="btn btn-info btn-sm"> Edit</a>
                                        <a href="{{ route('delete-brand',$brand->id) }}" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                        <div class="col-md-4">
                             <div class="card-header">
                                Add Brand
                              </div>
                            <form action="{{ route('brand-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                              <div class="mb-3">
                                <label for="">Brand Name</label>
                                <input type="name" name="brand_name" class="form-control" id="brand_name" aria-describedby="brand_name">
                                @error('brand_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror

                              </div>
                              <div class="form-group m-1">
                                <div class="mb-3">
                                  <label for="">Brand Image</label>
                                  <input type="file" name="brand_image" id="brand_image">
  
                                  @error('brand_image')
                                      <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
