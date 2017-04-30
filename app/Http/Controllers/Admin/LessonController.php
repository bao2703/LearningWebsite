<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\Project;
use Illuminate\Http\Request;

class LessonController extends AdminController
{
    public function index(Project $project)
    {
    	$lessons = $project->lessons;
	    return view('admin.lesson.index')->with('lessons', $lessons);
    }

	public function create()
	{
		return view('admin.lesson.create');
	}
}