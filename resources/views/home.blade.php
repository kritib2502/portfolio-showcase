
<x-layout>
    <x-slot name="content">
    <div class="p-4">
  <div class="sm:flex sm:justify-center sm:items-center sm:pt-0">
    <div class="group hover:bg-slate-900 p-6 bg-white overflow-hidden shadow sm:rounded-lg break-normal sm:w-5/6 mx-auto border-solid border-4 border-black">
      <h1 class="text-2xl font-bold group-hover:text-white text-center mb-4">What I've been up to..</h1>
      <div class="flex flex-col sm:flex-row sm:items-center">
        <img src="{{url('storage/images/internal-project.png')}}" alt="Placeholder Image" class="border-solid border-2 border-black rounded-lg w-full sm:w-1/2 my-2 shadow-2xl group-hover:border-white">
        <div class="flex flex-col group-hover:text-white p-8 text-lg sm:w-1/2">
          <p class="text-m font-semibold underline">Project Overview</p>
          <ul>
            <li>Framework - ASP .Net Core</li>
            <li>Language - C#</li>
            <li>Database - Microsoft SQL Server </li>
          </ul>
          <p class="mt-4 group-hover:first-letter:text-white group-hover:text-white">This is an internal project, where a team of 5 developers is working on creating a website that allows users to buy tickets for the FoodScape Food Festival. It allows users to check Vendor schedules and manage tickets purchased per user. Implementation of Web Security via Anti-Forgery Tokens and Email Confirmation. Transactions are completed through the use of PayPal</p>
        </div>
      </div>   
    </div>
  </div>
</div>

        <div class="flex flex-col">     
  <p class="text-amber-500 text-xl font-bold pt-4 pl-4 mt-4 text-center md:text-left">Some projects I have worked on..</p>
  <section class="grid grid-cols-1 md:grid-cols-3 gap-2">
    @foreach ($projects as $project)
      <x-projects.project-feature :project="$project" />
    @endforeach
  </section>    
</div>

<div class="flex justify-center">     
<button class="p-4 mb-4 rounded-full bg-fuchsia-400 text-white  hover:bg-amber-500"><a href="/projects">View More Projects</a></button>
</div>
    </x-slot>
</x-layout>