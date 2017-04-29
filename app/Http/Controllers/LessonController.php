<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
	public function show(Lesson $lesson)
	{
		$user = Auth::user();
		$user_lesson = $user->lessons()->where('id', $lesson->id)->first();

		if ($user_lesson) {
			$user_progress = $user_lesson->pivot->user_progress;
		} else {
			$user_progress = $lesson->content;
		}

		return view('client.lesson.show')->with([
			'lesson' => $lesson,
			'user_progress' => $user_progress,
			'user' => $user
		]);
	}
}
