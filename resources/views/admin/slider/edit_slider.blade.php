@extends('admin.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           
                <div class="card-header">
                   Update Slider
                 </div>
               <form action="{{ route('update-slider',$sliders->id) }}" method="post" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="old_image" value="{{$sliders->image}}">
                   
                 <div class="mb-3">
                   <label for="">Title</label>
                   <input type="title" name="title" class="form-control" id="title" aria-describedby="title" value="{{ $sliders->title }}">
                    
                   @error('title')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">description</label>
                   <textarea name="description" id="description" style="width: 100%" rows="0">
                    {{ $sliders->description }}
                </textarea>
                    
                   @error('description')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>
                 <div class="form-group m-1">
                   <div class="mb-3">
                     <label for="">Slider Image</label>
                     <input type="file" name="image" id="image" value="{{ $sliders->image }}">
                     <img src="{{ asset($sliders->image) }}" alt="img">

                     @error('image')
                         <span style="color:red">{{ $message }}</span>
                     @enderror
                   </div>
                 </div>
                 <button type="submit" class="btn btn-primary">Update Slider</button>
               </form>
           
        </div>
    </div>
</div>

@endsection