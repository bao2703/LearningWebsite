<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
	public function show(Lesson $lesson)
	{
		$user = Auth::user();
		$user_lesson = $lesson->users->where('id', $user->id)->first();

		if ($user_lesson) {
			$current_process = $user_lesson->pivot->current_process;
		} else {
			$current_process = $lesson->content;
		}

		return view('client.lesson.show')->with([
			'lesson' => $lesson,
			'current_process' => $current_process
		]);
	}
}
