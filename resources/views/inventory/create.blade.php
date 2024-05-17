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
          <div>
            <h1 class="text-3xl font-bold">Create Inventory</h1>
          </div>
          <div>
            <form action="{{ route('inventory.store')}}" method="post">
              @method('POST')
              @csrf
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Barang</label>
                <input type="text" name="name" id="name" class="input input-bordered w-full max-w-xs border border-gray-500">
              </div>
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="input input-bordered w-full max-w-xs border border-gray-500">
              </div>
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" class="input input-bordered w-full max-w-xs border border-gray-500">
              </div>
              <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
