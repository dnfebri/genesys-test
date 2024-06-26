<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Inventory') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex justify-end">
            <a class="btn btn-primary" href="{{ route('inventory.create') }}">Add</a>
          </div>
          <div class="overflow-x-auto">
            <table class="table table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Stock</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $row)

                <tr>
                  <th>{{$row['id']}}</th>
                  <td>{{$row['name']}}</td>
                  <td>{{$row['stok']}}</td>
                  <td>{{$row['harga']}}</td>
                  <td>
                    <div class="flex gap-2">
                      {{-- <button class="badge badge-success" onclick="my_modal_2.showModal()">Tambah Stok</button> --}}
                      <a class="badge badge-success" href="{{ route('inventory.editStock', ['inventory' => $row['id']]) }}">Add stock</a>
                      <a class="badge badge-warning" href="{{ route('inventory.edit', ['inventory' => $row['id']]) }}">Edit</a>
                      <form action="{{ route('inventory.destroy', ['inventory' => $row['id']]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge badge-error" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
