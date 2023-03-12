
@props(['project','showBody' => false]) 
           <div class="group hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 transition ease-in-out p-6 m-4 bg-white overflow-hidden shadow sm:rounded-lg break-normal max-w-md border-solid border-4 border-indigo-200">
               <div class="group-hover:text-white">
                <div class="text-xl font-bold">
                    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
                </div>
             
                  @if (!$showBody)
                  <div class="flex flex-row">
                   @if($project->thumb)
                    <img src="{{url('storage/' . $project->thumb)}}" alt="Placeholder Image" class="w-1/2 my-2">
                    @else
                    <img src="{{url('storage/images/placeholder.png')}}" class="p-4 w-1/2 my-2" />
                   @endif
                   <div class="p-4">{!! $project->excerpt !!}</div>
                   </div>
                @endif
              </div>
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
           