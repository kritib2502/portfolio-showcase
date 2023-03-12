
<x-layout>
    <x-slot name="content">
     @if ( isset($category))
     <div class="text-sm text-gray-500 bg-gray-100 p-4 sm:text-left dark:text-gray-400"><a href="/projects"> &#8592; Back to Projects</a></div>
                <h2  class="text-xl font-bold text-center bg-gray-100">{{ $category}} Projects</h2> 

           @elseif ( isset($tag))
     <div class="text-sm text-gray-500 bg-gray-100 p-4 sm:text-left dark:text-gray-400"><a href="/projects"> &#8592; Back to Projects</a></div>
                <h2  class="text-xl font-bold text-center bg-gray-100">{{ $tag}} Projects</h2> 
             @else
             <h2  class="text-xl font-bold text-center bg-gray-100">Projects</h2> 
         @endif

<div class="relative flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
  <div class="mt-6 p-4 md:p-9">
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
      @foreach ($projects as $project)
        <x-projects.project-card :project="$project" />
      @endforeach
    </section>
    @if (count($projects))
      <div class="text-xs mt-4 w-full text-right">{{ $projects->links() }}</div>
    @else
      <div>Nothing to showcase, yet.</div>
    @endif
  </div>
</div>

    </x-slot>
</x-layout>