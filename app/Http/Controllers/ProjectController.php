<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;



class ProjectController extends Controller
{
    
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null)
             ->with('tagName',null);
    }

    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects()->orderBy('published_date', 'asc')->paginate(4)->withQueryString())
        ->with("category", $category->name);
        // ->with('category',$category)
        // ->with('projects', $category->projects);
    }


    public function listByTag(Tag $tag)
    {
        return view('projects.index')
        // ->with('tag',$tag)
        // ->with('projects', $tag->projects);
        ->with('projects', $tag->projects()->orderBy('published_date', 'asc')->paginate(2)->withQueryString())
        ->with("tag", $tag->name);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('project',null)
        ->with('categories', Category::all())
        ->with('tags',Tag::all());
    }

    public function store(Request $request) {
       // ddd(request()->all());

        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['title']);

         // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

     

         //save it to the db
         $project = Project::create($attributes);

         $project->tags()->attach($request['tags']);
        // $project->tags()->attach([1,2,5]);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags',Tag::all());
    }
    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['title']);

         // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;


        $project->tags()->sync($request['tags']);
      //  $project->tags()->sync([2,4]);

         //save it to the db
         $project->update($attributes);

        // Set a flash message
        session()->flash('success','Project updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

}

public function destroy(Project $project) {
    $project->delete();

    // Set a flash message
    session()->flash('success','Project Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');

   // $project->tags()->detach();
}

public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }


}