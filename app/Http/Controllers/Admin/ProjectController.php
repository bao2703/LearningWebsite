<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends AdminController
{
	public function index(Request $request)
	{
		$search = $request->search;
		$projects = Project::searchBy($search)->orderBy('sort_order')->paginate(10);
		return view('admin.project.index')
			->with('projects', $projects)
			->with('search', $search);
	}

	public function create()
	{
		return view('admin.project.create');
	}

	public function store(CreateProjectRequest $request)
	{
		Project::create([
			'name' => $request->name,
			'title' => $request->title,
			'sort_order' => $request->sort_order
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
		$project->update([
			'name' => $request->name,
			'title' => $request->title,
			'sort_order' => $request->sort_order
		]);
		Session::flash('message', 'Record has been updated successfully.');
		Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.project.edit', $project);
	}

	public function delete(Project $project)
	{
		return view('admin.project.delete')->with('project', $project);
	}

	public function destroy(Project $project)
	{
		$project->delete();
		return view('admin.project.delete')->with('project', $project);
	}
}