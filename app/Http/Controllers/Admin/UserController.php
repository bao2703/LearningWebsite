<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends AdminController
{
	public function index()
	{
		$user = User::paginate(10);
		return view('admin.user.index')->with('users', $user);
	}

	public function destroy(User $user)
	{
		$user->delete();
		return redirect()->route('admin.user.index');
	}
}
