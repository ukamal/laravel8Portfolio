<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="card-header">
                                Update Category
                              </div>
                            <form action="{{route('cat-update',$showCat->id)}}" method="post">
                                @csrf
                              <div class="mb-3">
                                <input type="name" name="category_name" class="form-control" id="category_name" 
                                aria-describedby="category_name" value="{{$showCat->category_name}}">

                              </div>
                              <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
