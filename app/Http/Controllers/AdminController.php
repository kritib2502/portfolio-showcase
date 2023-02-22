<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index')
            ->with('projects', Project::all())
            ->with('users', User::all())
            ->with("showBackToProjects", false);
    }

    
    public function projects()
    {
        return view("admin.projects")
            ->with("projects", Project::all());
    }


    public function showProject(Project $project)
    {
        return view('admin.project',['project' => $project]);
    }

}