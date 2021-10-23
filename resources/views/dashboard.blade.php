<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.. <b>{{ Auth::user()->name }}</b>
            <h3 style="float:right;margin-top:-35px;">
                <button type="button" class="btn btn-primary">
                  Total User: <span class="badge bg-danger">{{ count($users) }}</span>
                </button>
            </h3>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SL.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php( $i =1)
                   @foreach($users as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
