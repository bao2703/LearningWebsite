<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class SlideController extends Controller
{
	public function index(Lesson $lesson)
	{
		$slides = $lesson->slides()->paginate(10);
		return view('admin.slide.index')
			->with('slides', $slides)
			->with('lesson', $lesson);
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
				$slide = $lesson->slides()->create([
					'image' => 'storage/' . $path,
					'sort_order' => $request->sort_order,
				]);
				if ($request->has('has_task')) {
					$slide->task()->create([
						'description' => $request->task,
						'solution' => $request->solution
					]);
				}
				return redirect()->route('admin.slide.index', $lesson->id);
			}
		}
		$errors = new MessageBag(['image' => 'Image is required.']);

		return redirect()->back()->with([
			'errors' => $errors
		]);
	}

	public function edit(Slide $slide)
	{
		return view('admin.slide.edit')->with('slide', $slide);
	}
}