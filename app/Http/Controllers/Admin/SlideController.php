<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function index(Lesson $lesson) {
    	$slides = $lesson->slides;
    	return view('admin.slide.index')->with('slides', $slides);
    }

	public function create()
	{
		return view('admin.slide.create');
	}
}