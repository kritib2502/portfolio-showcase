<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;



class ProjectController extends Controller
{
    
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null);
    }

    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('category',$category)
        ->with('projects', $category->projects);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('project',null)
        ->with('categories', Category::all());
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
         Project::create($attributes);

         //$project->tags()->attach($request['tags']);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all());
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


      //  $project->tags()->attach($request['tags']);

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
}


}