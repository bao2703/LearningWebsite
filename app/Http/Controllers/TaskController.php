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
		$user_process = $request->user_process;

		$user->lessons()->detach($lesson->id);
		$user->lessons()->attach($lesson->id, ['user_process' => $user_process]);

		$success_task = array();
		foreach ($lesson->slides as $slide) {
			if ($slide->task) {
				$solution = $slide->task->solution;
				if (str_contains(strtolower($solution), strtolower($user_process))) {
					$user->tasks()->detach($slide->task->id);
					$user->tasks()->attach($slide->task->id);
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
