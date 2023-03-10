<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

     public function create() {
        return view('admin.categories.create')
        ->with('category',null);
       
    }

     public function store(Request $request) {
       // ddd(request()->all());

        $attributes = request()->validate([
            'name' => 'required'
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['name']);

         //save it to the db
         $category = Category::create($attributes);

        // Set a flash message
        session()->flash('success','Category Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);   
    }
    public function update(Category $category, Request $request) {

        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id]
        ]);

         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['name']);

       
         //save it to the db
         $category->update($attributes);

        // Set a flash message
        session()->flash('success','Category updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

}

public function destroy(Category $category) {
    $category->delete();

    // Set a flash message
    session()->flash('success','Category Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');

}

}
