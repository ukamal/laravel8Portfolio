@extends('admin.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           
                <div class="card-header">
                   Add Contact
                 </div>
               <form action="{{ route('store-contact') }}" method="post" enctype="multipart/form-data">
                   @csrf
                 <div class="mb-3">
                   <label for="">Contact Address</label>
                   <input type="address" name="address" class="form-control" id="address" aria-describedby="brand_name">
                    
                   @error('address')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">Contact Email</label>
                   <input type="email" name="email" class="form-control" id="email" aria-describedby="brand_name">
                    
                   @error('email')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="mb-3">
                   <label for="">Contact Phone</label>
                   <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="brand_name">
                    
                   @error('phone')
                       <span style="color:red">{{ $message }}</span>
                   @enderror

                 </div>
                 <button type="submit" class="btn btn-primary">Add Contact</button>
               </form>
           
        </div>
    </div>
</div>

@endsection