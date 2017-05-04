<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

class UserController extends AdminController
{
	public function index(Request $request)
	{
		$search = $request->search;
		$user = User::searchBy($search)->paginate(10);
		return view('admin.user.index')
			->with('users', $user)
			->with('search', $search);
	}

	public function destroy(User $user)
	{
		$user->delete();
		return redirect()->route('admin.user.index');
	}
}
