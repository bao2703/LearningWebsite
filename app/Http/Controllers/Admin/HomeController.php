<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends AdminController
{
    public function index()
    {
	    return view('admin.home.index');
    }
}