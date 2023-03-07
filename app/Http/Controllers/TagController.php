<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
 public function create() {
        return view('admin.tags.create')
        ->with('tag',null);
       
    }

     public function store(Request $request) {
       // ddd(request()->all());

        $attributes = request()->validate([
            'name' => 'required'
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['name']);

         //save it to the db
         $tag = Tag::create($attributes);

        // Set a flash message
        session()->flash('success','Tag Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);   
    }
    public function update(Tag $tag, Request $request) {

        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id]
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['name']);

       
         //save it to the db
         $tag->update($attributes);

        // Set a flash message
        session()->flash('success','Tag updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

}

public function destroy(Tag $tag) {
    $tag->delete();

    // Set a flash message
    session()->flash('success','Tag Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');

}



}
