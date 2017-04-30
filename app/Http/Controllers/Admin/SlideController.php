<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Request;

class SlideController extends Controller
{
	public function index(Lesson $lesson)
	{
		$slides = $lesson->slides;
		return view('admin.slide.index')->with('slides', $slides);
	}

	public function create(Lesson $lesson)
	{
		return view('admin.slide.create')->with('lesson', $lesson);
	}

	public function store(Lesson $lesson, Request $request)
	{
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			if ($file->isValid()) {
				$path = $file->store('images', 'public');
				$lesson->slides()->create([
					'image' => 'storage/' . $path,
					'sort_order' => $request->sort_order,
				]);
				return redirect()->route('admin.slide.index', $lesson->id);
			}
		}
		return "";
	}
}