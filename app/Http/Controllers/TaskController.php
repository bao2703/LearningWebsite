<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
	public function check(Request $request)
	{
		$response = ['status' => false];
		$lesson = Lesson::find($request->lesson_id);
		$user_process = $request->user_process;
		$user = Auth::user();

		$user->lessons()->syncWithoutDetaching([$lesson->id, ['current_process' => $user_process]]);

		$slide = Slide::find($request->slide_id);
		if ($slide->task) {
			$solution = $slide->task->solution;
			if (str_contains(strtolower($solution), strtolower($user_process))) {
				$response = ['status' => true];
				$user->tasks()->syncWithoutDetaching([$slide->task->id]);
			}
		}
		return response()->json($response, 200);
	}
}
