@extends('admin.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           
                <div class="card-header">
                   Add Slider
                 </div>
               <form action="{{ route('store-slider') }}" method="post" enctype="multipart/form-data">
                   @csrf
                 <div class="mb-3">
                   <label for="">Title</label>
                   <input type="title" name="title" class="form-control" id="title" aria-describedby="brand_name">
                    
                   @error('title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">description</label>
                   <textarea name="description" id="description" style="width: 100%" rows="0"></textarea>
                    
                   @error('description')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>
                 <div class="form-group m-1">
                   <div class="mb-3">
                     <label for="">Slider Image</label>
                     <input type="file" name="image" id="image">

                     @error('image')
                         <span style="color:red">{{ $message }}</span>
                     @enderror
                   </div>
                 </div>
                 <button type="submit" class="btn btn-primary">Add Slider</button>
               </form>
           
        </div>
    </div>
</div>

@endsection