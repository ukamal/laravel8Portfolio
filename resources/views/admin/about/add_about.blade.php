@extends('admin.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           
                <div class="card-header">
                   <a href="{{ route('all-about') }}">Back</a>
                 </div>
               <form action="{{ route('store-about') }}" method="post" enctype="multipart/form-data">
                   @csrf
                 <div class="mb-3">
                   <label for="">Title</label>
                   <input type="title" name="title" class="form-control" id="title" aria-describedby="title">
                    
                   @error('title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">Short Description</label>
                   <textarea name="short_des" id="short_des" style="width: 100%" rows="0"></textarea>
                    
                   @error('short_des')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                    <label for="">Long Description</label>
                    <textarea name="long_des" id="long_des" style="width: 100%" rows="0"></textarea>
                     
                    @error('long_des')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
 
                  </div>

                 <button type="submit" class="btn btn-primary">Add About</button>
               </form>
           
        </div>
    </div>
</div>

@endsection