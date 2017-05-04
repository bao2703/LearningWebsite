<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateLessonRequest;
use App\Lesson;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LessonController extends AdminController
{
    public function index(Project $project)
    {
    	$lessons = $project->lessons()->paginate(10);
	    return view('admin.lesson.index')
		    ->with('lessons', $lessons)
		    ->with('project', $project);
    }

	public function create(Project $project)
	{
		return view('admin.lesson.create')->with('project', $project);
	}

	public function store(Project $project, CreateLessonRequest $request)
	{
		$project->lessons()->create([
			'name' => $request->name,
			'content' => $request->content
		]);
		Session::flash('message', 'Record has been created successfully.');
		Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.lesson.create', $project);
	}

	public function edit(Lesson $lesson)
	{
		return view('admin.lesson.edit')->with('lesson', $lesson);
	}

	public function update(Lesson $lesson, Request $request)
	{
		$lesson->update([
			'name' => $request->name,
			'content' => $request->content
		]);
		Session::flash('message', 'Record has been updated successfully.');
		Session::flash('alert-class', 'alert-success');
		return view('admin.lesson.edit')->with('lesson', $lesson);
	}

	public function destroy(Lesson $lesson)
	{
		$lesson->delete();
		return redirect()->route('admin.lesson.index', $lesson->project);
	}
}