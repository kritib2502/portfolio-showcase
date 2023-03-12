
<x-layout>
  <x-slot name="content">

       <div
    class="relative flex justify-center min-h-[80vh] bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <main class="max-w-lg mx-auto border-black bg-violet-100 border-2 p-12 rounded-lg m-16">
      @if ($project)
      

<h1 class="text-center font-bold text-xl mb-3">Edit Project: {{ $project->title }}</h1>
<form method="POST" action="/admin/projects/{{ $project->id }}/edit" enctype="multipart/form-data">
    @method('PATCH')
@else
    <h1 class="text-center font-bold text-xl mb-3">Create Project</h1>
    <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
@endif
      @csrf
       
        <div class="mb-6">
    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('title')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
    <textarea  name="excerpt" id="excerpt" required
    class="border border-gray-400 rounded p2 w-full h-12">{{ old('excerpt') ?? $project?->excerpt }}</textarea>
    @error('excerpt')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
        <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
        <input type="file" name="thumb" id="thumb"
          value="{{ old('thumb') ?? $project?->thumb }}"
          class="border border-gray-400 rounded p2 w-full">
        @error('thumb')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
        <input type="file" name="image" id="image"
          value="{{ old('image') ?? $project?->image }}"
          class="border border-gray-400 rounded p2 w-full">
        @error('image')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
<div class="mb-6">
    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
    <textarea  name="body" id="body" required
    class="border border-gray-400 rounded p2 w-full h-24"> {{ old('body') ?? $project?->body }}</textarea>
    @error('body')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="url" class="block mb-2 uppercase font-bold text-xs text-gray-700">URL</label>
    <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url}}"
    class="border border-gray-400 rounded p2 w-full">
    @error('url')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="date" class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
    <input type="date" name="date" id="date" value="{{ old('date') ?? $project?->published_date}}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('date')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
  <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
<select name="category_id" id="category_id">
    <option value="" selected disabled>Select a Category</option>
    <option value="">None</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
         @if ($category->id == old('category_id'))
         selected 
        @elseif($category->id == $project?->category_id)
        selected
        @endif>
            {{ $category->name }}</option>
    @endforeach
</select>
<div class="mb-6">
<label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
<select name="tags[]" id="tags" multiple="multiple">
    @foreach ($tags as $tag)
    <option value="{{ $tag->id }}"
        @if (old('tags') && in_array($tag->id, old('tags')))
                selected
        @elseif ($project && $project->tags)
            @foreach ($project->tags as $projectTag)
                @if ($tag->id == $projectTag->id)
                    selected
                @endif
            @endforeach
        @endif
        >
        {{ $tag->name }}</option>
    @endforeach
</select>
@error('tags')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
@enderror
</div>
        <div class="mb-6">
          <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
           <button class=" bg-red-600 text-white rounded py-2 px-4 hover:bg-red-500"> <a href="/admin">Cancel</a></button>
        </div>
      </form>

    </main>
    </div>
  </x-slot>
</x-layout>