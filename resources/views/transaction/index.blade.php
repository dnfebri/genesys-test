<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Pembelian') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex justify-end">
            <a class="btn btn-primary" href="{{ route('pembelian.create') }}">Add</a>
          </div>
          <div class="overflow-x-auto">
            <table class="table table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th>Transaksi Id</th>
                  <th>Name</th>
                  <th>Stock</th>
                  <th>Harga</th>
                  <th>Total Pembelian </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $row)

                <tr>
                  <th>{{$row['transaction_id']}}</th>
                  <td>{{$row['name_product']}}</td>
                  <td>{{$row['quantity']}}</td>
                  <td>{{$row['price']}}</td>
                  <td>{{$row['amount']}}</td>
                  <td>
                    <div class="flex gap-2">
                      <a class="badge badge-success" href="{{ route('pembelian.show', ['transaction' => $row['id']]) }}">Lihat</a>
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
