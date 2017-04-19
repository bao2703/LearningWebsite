<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

	public function store(ProjectRequest $request)
	{
		Project::create([
			'name' => $request->name,
			'title' => $request->title
		]);
		Session::flash('message', 'Record has been created successfully');
		Session::flash('alert-class', 'alert-success');
		return view('admin.project.create');
	}

	public function edit($id)
	{
		$project = Project::find($id);
		return view('admin.project.edit')->with('project', $project);
	}

	public function update(ProjectRequest $request, $id)
	{
		$project = Project::find($id);
        $project->name = $request->name;
        $project->title = $request->title;
        $project->save();
        Session::flash('message', 'Record has been updated successfully');
		Session::flash('alert-class', 'alert-success');
		return view('admin.project.edit')->with('project', $project);
	}
}