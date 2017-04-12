<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id)
    {
	    $lesson = Lesson::find($id);
	    return view('client.lesson.index')->with('lesson', $lesson);
    }
}
