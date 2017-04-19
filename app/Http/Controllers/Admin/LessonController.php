<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends AdminController
{
    public function index($projectId)
    {
    	$lessons = Lesson::where('project_id', $projectId)->get();
	    return view('admin.lesson.index')->with('lessons', $lessons);
    }
}
