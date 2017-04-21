<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	protected $redirectTo = '/home';

	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}

	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		$this->validator($request->all())->validate();

		$credentials = ['email' => $request->email, 'password' => $request->password];
		// TODO: check role here

		if (Auth::attempt($credentials, $request->has('remember'))) {
			if (Auth::user()->isAdmin)
				return redirect()->intended(route('admin.home'));
			else
				return redirect()->intended(route('home'));
		}

		$errors = new MessageBag(['password' => 'Email or password invalid.']);

		return redirect()->back()->with([
			'input' => $request->only('email'),
			'errors' => $errors
		]);
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('home');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email',
			'password' => 'required'
		]);
	}
}
