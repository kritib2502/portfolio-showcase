<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create() {
        return view('register_user.create');
    }

    public function createByAdmin() {
        return view('admin.users.create');
    }


    public function store(User $user) {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email,' .$user->id],
            'password' => ['required','min:8','confirmed'],
        ]);

        User::create($attributes);
        // $user = User::create($attributes);

        session()->flash('success','User Created Successfully');
        // auth()->login($user);
        return redirect("/admin");
    }
 
    public function edit(User $user) {
        return view('admin.users.create')
            ->with('user', $user);
    }


    public function update(User $user, Request $request) {
        $attributes = request()->validate([
            "name" => "required",
            'email' => ['required','unique:users,email,'.$user->id]
        ]);

        // Save updates to the DB
        $user->update($attributes);
        
        // Set a flash message
        session()->flash('success','User Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}


