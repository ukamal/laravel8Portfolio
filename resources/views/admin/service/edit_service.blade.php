@extends('admin.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           
                <div class="card-header">
                   Add Service
                 </div>
               <form action="{{ route('update-service',$services->id) }}" method="post" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="old_image" value="{{ $services->icon }}">
                 <div class="mb-3">
                   <label for="">page sub title</label>
                   <input type="page_sub_title" name="page_sub_title" class="form-control" id="page_sub_title" aria-describedby="page_sub_title"
                    value="{{ $services->page_sub_title}}">
                    
                   @error('page_sub_title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 
                 <div class="form-group m-1">
                    <div class="mb-3">
                      <label for="">icon</label>
                      <input type="file" name="icon" id="icon">
                        <img src="{{ asset($services->icon) }}" alt="">
                      @error('icon')
                          <span style="color:red">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                 <div class="mb-3">
                   <label for="">title</label>
                   <input type="title" name="title" class="form-control" id="title" aria-describedby="title" value="{{ $services->title}}">
                    
                   @error('title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">sub_title</label>
                   <textarea name="sub_title" id="sub_title" style="width: 100%" rows="0">
                    {{ $services->sub_title}}
                    </textarea>
                    
                   @error('sub_title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <button type="submit" class="btn btn-primary">Update Service</button>
               </form>
           
        </div>
    </div>
</div>

@endsection