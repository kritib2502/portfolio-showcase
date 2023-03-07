{{-- @props(['project'])  --}}
@props(['project','showBody' => false]) 
           <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg break-normal max-w-md">
                <div class="text-xl font-bold">
                    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
                </div>
             
                  @if (!$showBody)
                  <div class="flex flex-row">
                   @if($project->thumb)
                    <img src="{{url('storage/' . $project->thumb)}}" alt="Placeholder Image" class="w-5/6 my-2">
                    @else
                    <img src="{{url('storage/images/placeholder.png')}}" class="p-4 w-1/2 my-2" />
                   @endif
                   <div class="p-4">{!! $project->excerpt !!}</div>
                   </div>
                @endif
                @if ($showBody)
                   @if($project->image)
                    <img src="{{url('storage/' . $project->image)}}" alt="Placeholder Image" class="w-5/6 my-2">
                    @else
                       <div class="flex justify-center p-4">
                         <img src="{{url('storage/images/placehold.jpg')}}" />
                           </div>
                              @endif
                 <div class="flex flex-col gap-2 mt-2">{!! $project->body!!}</div>
                @endif 
     
            <footer class="text-sm text-gray-500 p-1 sm:text-left dark:text-gray-400">
             @if ($project->category)
              <span>Category:<a href="/projects/categories/{{ $project->category->slug }}"> {{ $project->category->name }} </a></span>
             @endif
             @if(count($project->tags))
             <div class="text-xs">Tags:
             @foreach($project->tags as $tag)
                   <a href="/projects/tags/{{ $tag->slug }}"> {{$tag->name }} </a>
             @endforeach
             </div>
              @endif 
            </footer>
            </div>
           