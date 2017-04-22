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
		$response = [
			'status' => false
		];
		$lesson = Lesson::find($request->lesson_id);
		$userInput = $request->user_process;
		$user = Auth::user();
		$user->lessons()->detach($lesson->id);
		$user->lessons()->attach($lesson->id, ['current_process' => $userInput]);

		$slide = Slide::find($request->slide_id);
		if ($slide->task) {
			$solution = $slide->task->solution;
			if (str_contains(strtolower($solution), strtolower($userInput))) {
				$response = [
					'status' => true
				];
			}
		}
		return response()->json($response, 200);
	}
}
