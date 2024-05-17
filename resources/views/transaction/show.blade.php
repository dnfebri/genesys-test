<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Slip') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <div>
            <div class="flex gap-4 items-center border">
              <h2 class="font-bold text-xl text-gray-700 min-w-[200px]">Transaksi</h2>
              <p class="font-bold">{{$transaction->transaction_id}}</p>
            </div>
            <div class="flex gap-4 items-center border">
              <h2 class="block font-medium text-sm text-gray-700">Nama : </h2>
              <p>{{$transaction->name_product}}</p>
            </div>
            <div class="flex gap-4 items-center border">
              <h2 class="block font-medium text-sm text-gray-700">Jumlah Pembelian : </h2>
              <p>{{$transaction->quantity}}</p>
            </div>
            <div class="flex gap-4 items-center border">
              <h2 class="block font-medium text-sm text-gray-700">Harga Satuan : </h2>
              <p>{{$transaction->price}}</p>
            </div>
            <div class="flex gap-4 items-center border">
              <h2 class="block font-medium text-sm text-gray-700">Total Pembelian : </h2>
              <p>{{$transaction->amount}}</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
