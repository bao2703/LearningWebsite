<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
    	$projects = Project::all();
	    return view('client.project.index')->with('projects', $projects);
    }
}