<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __($metaData['title']) }}
    </h2>
  </x-slot>

  @if (session('error'))
  <div role="alert" class="alert alert-warning">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
    <span>{{session('error')}}</span>
  </div>
  @endif
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
              <div class="my-4">
                <label for="" class="block font-medium text-sm text-gray-700">Barang</label>
                {{-- <input value="{{$inventory['name'] ?? '' }}{{' - sisa stock: ' . $inventory['stok']}}" readonly type="text" name="name" id="name" class="input input-bordered w-full max-w-xs border border-gray-500"> --}}
                <select name="name" class="select select-bordered w-full max-w-xs">
                  @foreach ($data as $row)
                  <option value="{{$row['id']}}">{{$row['name'] . ' - sisa stock: ' . $row['stok']}}</option>
                  @endforeach
                </select>
                @error('name')
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
              </div class="my-4">
              <div>
                <label for="" class="block font-medium text-sm text-gray-700">Jumlh Item</label>
                <input value="" type="string" name="item" id="item" class="input input-bordered w-full max-w-xs border border-gray-500">
                @error('item')
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
