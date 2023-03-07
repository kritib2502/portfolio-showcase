
@props(['projects', "users", 'categories','tags'])

<x-layout>
    <x-slot name="content">
           <div  class="relative flex flex-col justify-center min-h-[82vh] bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <h1 class="text-[#111010] text-center mt-6 mb-4 font-black">ADMIN</h1>

            <div class="w-full md:w-3/4 lg:w-1/2 bg-white rounded-lg px-4 py-2">

                <h1 class="font-bold">Projects</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                       <span><a href="/admin/projects/create"> Create Projects</a></span>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($projects as $project)
                        <tr class="odd: bg-gray-100 even:bg-white">
                            <td class="p-2 w-2/3 font-light">
                                <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
                            </td>
                            <td class="text-[#21217d]"> 
                            <div class="flex items-center">
                               <a href="/admin/projects/{{$project->id}}/edit">Edit </a>
                              <span><a href="/admin/projects/{{$project->id}}/edit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a></span>
                            </div>
                            </td>
                            <td class="text-red-600">
                             <div class="flex items-center">
                                   <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="text-red-600">Delete</button></form></span> 
                                   <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
 <div class="w-full md:w-3/4 lg:w-1/2 bg-white rounded-lg px-4 py-2 mt-10">

                <h1 class="font-bold">Categories</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                     <span><a href="/admin/categories/create"> Create Categories</a></span>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($categories as $category)
                         <tr class="odd: bg-gray-100 even:bg-white">
                            <td class="p-2 w-2/3 font-light">{{ $category->name }}</td>
                             <td class="text-[#21217d]"> 
                              <div class="flex items-center">
                               <a href="/admin/categories/{{$category->id}}/edit">Edit </a>
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg>
                             </div>
                            </td>
                            <td class="text-red-600">
                               <div class="flex items-center">
                                   <form method="POST" action="/admin/categories/{{$category->id}}/delete" class="inline">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="text-red-600">Delete</button></form></span> 
                                   <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="w-full md:w-3/4 lg:w-1/2 bg-white rounded-lg px-4 py-2 mt-10">

                <h1 class="font-bold">Tags</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                      <span><a href="/admin/tags/create"> Create Tags</a></span>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($tags as $tag)
                         <tr class="odd: bg-gray-100 even:bg-white">
                            <td class="p-2 w-2/3 font-light">{{ $tag->name }}</td>
                             <td class="text-[#21217d]"> 
                              <div class="flex items-center">
                               <a href="/admin/tags/{{$tag->id}}/edit">Edit </a>
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg>                             </div>
                            </td>
                            <td class="text-red-600">
                             <div class="flex items-center">
                                   <form method="POST" action="/admin/tags/{{$tag->id}}/delete" class="inline">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="text-red-600">Delete</button></form></span> 
                                   <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="w-full md:w-3/4 lg:w-1/2 bg-white rounded-lg px-4 py-2 mt-10">

                <h1 class="font-bold">Users</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                    <span><a href="/admin/users/create"> Create Users</a></span>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($users as $user)
                         <tr class="odd: bg-gray-100 even:bg-white">
                            <td class="p-2 w-2/3 font-light">{{ $user->name }}</td>
                             <td class="text-[#21217d]"> 
                              <div class="flex items-center">
                            <a href="/admin/users/{{$user->id}}/edit">Edit </a> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg>
                             </div>
                            </td>
                            @if(!$user?->isAdmin())
                            <td class="text-red-600">
                            <div class="flex items-center">
                                   <form method="POST" action="/admin/users/{{$user->id}}/delete" class="inline">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="text-red-600">Delete</button></form></span> 
                                   <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
                            </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </x-slot>
</x-layout>