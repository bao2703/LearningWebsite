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
		$task = Slide::find($request->id)->task()->where('solution', 'like', $request->input)->count();

		if ($task == 1) {
			$response = [
				'status' => true
			];
		}
		return response()->json($response, 200);
	}
}
