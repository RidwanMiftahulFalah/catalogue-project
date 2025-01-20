<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add New Product') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
              role="alert">
              <ul class="mx-4 list-disc list-outside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
              <input type="text" name="name" id="name"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('name') }}">
            </div>

            <div class="mb-3">
              <label for="price" class="block font-medium text-sm text-gray-700">Price</label>
              <input type="number" name="price" id="price"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('price') }}">
            </div>

            <div class="mb-3">
              <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
              <input type="text" name="description" id="description"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('description') }}">
            </div>

            <div class="mb-3">
              <label for="images" class="block font-medium text-sm text-gray-700">Images</label>
              <input type="file" multiple name="images[]" id="images"
                class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Save
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
