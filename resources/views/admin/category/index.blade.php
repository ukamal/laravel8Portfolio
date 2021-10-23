<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>
                                  {{ session('success') }}
                              </strong>
                              <button style="float:right" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif
                             <div class="card-header">
                                Category
                              </div>
                              <thead>
                                <tr>
                                  <th scope="col">SL.</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col">User</th>
                                  <th scope="col">Created at</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                             @foreach($showCat as $show)
                                <tr>
                                  <td>{{ $showCat->firstItem()+$loop->index }}</td>
                                  <td>{{ $show->category_name }}</td>
                                  <td>{{ $show->user->name }}</td>
                                  {{-- <td>{{ Carbon\Carbon::parse($show->created_at)->diffForHumans() }}</td> --}}
                                  <td>{{ $show->created_at->diffForHumans() }}</td>
                                  <td>
                                    <a href="{{ route('edit-cat',$show->id) }}" title="Edit" class="btn btn-info btn-sm"> Edit</a>
                                    <a href="{{ route('soft-delete',$show->id) }}" title="Delete" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                            {{$showCat->links()}}
                        </div>
                        <div class="col-md-4">
                             <div class="card-header">
                                Add Category
                              </div>
                            <form action="{{ route('cat.store') }}" method="post">
                                @csrf
                              <div class="mb-3">
                                <input type="name" name="category_name" class="form-control" id="category_name" aria-describedby="category_name">

                                @error('category_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror

                              </div>
                              <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start of Trash area -->
     <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                             <div class="card-header">
                                Trash List
                              </div>
                              <thead>
                                <tr>
                                  <th scope="col">SL.</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col">User</th>
                                  <th scope="col">Created at</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                             @foreach($trashCat as $show)
                                <tr>
                                  <td>{{ $showCat->firstItem()+$loop->index }}</td>
                                  <td>{{ $show->category_name }}</td>
                                  <td>{{ $show->user->name }}</td>
                                  {{-- <td>{{ Carbon\Carbon::parse($show->created_at)->diffForHumans() }}</td> --}}
                                  <td>{{ $show->created_at->diffForHumans() }}</td>
                                  <td>
                                    <a href="{{ route('restore-cat',$show->id) }}" title="Edit" class="btn btn-info btn-sm">restore</a>
                                    <a href="{{ route('pdelete',$show->id) }}" title="Delete" class="btn btn-danger btn-sm">P Delete</a>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                            {{$showCat->links()}}
                        </div>
    <!-- End of Trash area -->
</x-app-layout>
