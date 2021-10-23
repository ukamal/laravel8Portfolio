@extends('admin.master')
@section('content')
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
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
                                  Multiple Image
                              </div>
                             
                            </table>

                           <div class="conatiner">
                             <div class="row">
                              <div class="card-group">
                                @foreach ($images as $multiimg)
                                    <div class="col-md-4 mt-2">
                                      <div class="card">
                                        <img src="{{ asset($multiimg->image) }}" alt="img">
                                      </div>
                                    </div>
                                @endforeach
                              </div>
                             </div>
                           </div>
                            
                        </div>
                        <div class="col-md-4">
                             <div class="card-header">
                                Add Image
                              </div>
                            <form action="{{ route('multi-img-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-1">
                                  <div class="mb-3">
                                    <label for="">Image</label>
                                    <input type="file" name="image[]" id="image" multiple="">
    
                                    @error('image')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
