<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
	public function check(Request $request)
	{
		$user = Auth::user();
		$lesson = Lesson::find($request->lesson_id);
		$user_progress = $request->user_progress;

		$user->lessons()->syncWithoutDetaching([$lesson->id => ['user_progress' => $user_progress]]);

		$success_task = array();
		foreach ($lesson->slides as $slide) {
			if ($slide->task) {
				$solution = $slide->task->solution;

				if (str_contains(strtolower($user_progress), strtolower($solution))) {
					$user->tasks()->syncWithoutDetaching([$slide->task->id]);
					$success_task[] = $slide->task->id;
				}
			}
		}

		$response = [
			'success_task' => $success_task
		];

		return response()->json($response, 200);
	}
}
