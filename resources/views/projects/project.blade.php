
<x-layout>
    <x-slot name="content">
      <div class="text-sm text-gray-500 bg-gray-100 p-4 sm:text-left dark:text-gray-400"><a href="/projects"> &#8592; Back to Projects</a></div>
        <div class="relative flex justify-center min-h-[75vh] bg-gray-100 dark:bg-gray-900 sm:items-center p-20 sm:pt-0">
                  <x-projects.project-card :project="$project" :showBody="true"/>
            </div>
        </div>
    </x-slot>
</x-layout>