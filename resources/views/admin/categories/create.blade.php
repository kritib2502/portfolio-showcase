
<x-layout>
  <x-slot name="content">
  <div
    class="relative flex justify-center min-h-[80vh] bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <main class="max-w-lg mx-auto  border-black bg-indigo-100 border-2 p-12 rounded-lg m-16">
         @if ($category)
<h1 class="text-center font-bold text-xl mb-3">Edit Category: {{ $category->name }}</h1>
<form method="POST" action="/admin/categories/{{ $category->id }}/edit" enctype="multipart/form-data">
    @method('PATCH')
@else
    <h1 class="text-center font-bold text-xl mb-3">Create Category</h1>
    <form method="POST" action="/admin/categories/create" enctype="multipart/form-data">
@endif
      @csrf
        <div class="mb-6">
          <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}" required class="border border-gray-400 rounded p2 w-full">
        </div>
        
        <div class="mb-6">
          <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
           <button class=" bg-red-600 text-white rounded py-2 px-4 hover:bg-red-500"> <a href="/admin">
                            Cancel
                        </a></button>
        </div>
        
      </form>
    </main>
    </div>
  </x-slot>
</x-layout>