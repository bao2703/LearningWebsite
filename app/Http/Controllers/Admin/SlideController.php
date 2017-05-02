<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class SlideController extends Controller
{
	public function index(Lesson $lesson)
	{
		$slides = $lesson->slides()->orderBy('sort_order')->paginate(10);
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
				if ($request->has('task') || $request->has('solution')) {
					$slide->task()->create([
						'description' => $request->task,
						'solution' => $request->solution
					]);
				}
				Session::flash('message', 'Record has been created successfully.');
				Session::flash('alert-class', 'alert-success');
				return redirect()->route('admin.slide.create', $lesson);
			}
		}
		Session::flash('message', 'Image is required.');
		Session::flash('alert-class', 'alert-danger');
		return redirect()->route('admin.slide.create', $lesson);
	}

	public function edit(Slide $slide)
	{
		return view('admin.slide.edit')->with('slide', $slide);
	}

	public function update(Slide $slide, Request $request)
	{
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			if ($file->isValid()) {
				$path = $file->store('images', 'public');
				$slide->update([
					'image' => 'storage/' . $path,
				]);
			}
		}
		$slide->update([
			'sort_order' => $request->sort_order,
		]);
		if ($slide->task) {
			$slide->task()->update([
				'description' => $request->task,
				'solution' => $request->solution
			]);
		}
		Session::flash('message', 'Record has been updated successfully.');
		Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.slide.edit', $slide);
	}

	public function destroy(Slide $slide)
	{
		Slide::destroy($slide->id);
		return redirect()->route('admin.slide.index', $slide->lesson);
	}
}