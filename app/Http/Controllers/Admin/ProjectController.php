<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProjectRequest;
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

	public function store(CreateProjectRequest $request)
	{
		Project::create([
			'name' => $request->name,
			'title' => $request->title
		]);
		Session::flash('message', 'Record has been created successfully.');
		Session::flash('alert-class', 'alert-success');
		return view('admin.project.create');
	}

	public function edit(Project $project)
	{
		return view('admin.project.edit')->with('project', $project);
	}

	public function update(Request $request, Project $project)
	{
		$project->name = $request->name;
		$project->title = $request->title;
		$project->save();
		Session::flash('message', 'Record has been updated successfully.');
		Session::flash('alert-class', 'alert-success');
		return view('admin.project.edit')->with('project', $project);
	}

	public function delete(Project $project)
	{
		return view('admin.project.delete')->with('project', $project);
	}

	public function destroy(Project $project)
	{
		Project::destroy($project->id);
		return view('admin.project.delete')->with('project', $project);
	}
}