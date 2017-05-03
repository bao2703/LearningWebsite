<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends AdminController
{
    public function index()
    {
	    return redirect()->route('admin.project.index');
    }
}