<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
	public function show(Lesson $lesson)
	{
		$user_lesson = Auth::user()->lessons->where('id', $lesson->id)->first();
		if ($user_lesson) {
			Session::flash('current_process', $user_lesson->pivot->current_process);
		}
		return view('client.lesson.show')->with('lesson', $lesson);
	}
}
