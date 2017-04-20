<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	public function check(Request $request)
	{
		$response = [
			'status' => false
		];
		$slide = Slide::find($request->id);
		if (str_contains(strtolower($slide->task->solution), strtolower($request->input))) {
			$response = [
				'status' => true
			];
		}
		return response()->json($response, 200);
	}
}
