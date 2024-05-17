<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __($metaData['title']) }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div>
            <h1 class="text-3xl font-bold">{{$metaData['title']}}</h1>
          </div>
          <div>
            <form action="{{ $metaData['url'] }}" method="post">
              @method($metaData['action'])
              @csrf
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Barang</label>
                <input value="{{$inventory['name'] ?? ''}}" type="text" name="name" id="name" class="input input-bordered w-full max-w-xs border border-gray-500">
                @error('name')
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
              </div>
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Stock</label>
                <input value="{{$inventory['stok'] ?? ''}}" type="string" name="stock" id="stock" class="input input-bordered w-full max-w-xs border border-gray-500">
                @error('stock')
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
              </div>
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Harga</label>
                <input value="{{$inventory['harga'] ?? ''}}" type="string" name="harga" id="harga" class="input input-bordered w-full max-w-xs border border-gray-500">
                @error('harga')
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
              </div>
              <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">{{$metaData['buttom']}}</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
