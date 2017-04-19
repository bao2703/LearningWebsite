<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends AdminController
{
    public function index()
    {
    	$projects = Project::all();
	    return view('admin.project.index')->with('projects', $projects);
    }

	public function create()
	{
		return view('admin.project.create');
	}

	public function store()
	{
		return response("Ok", 200);
		return view('admin.project.create');
	}
}