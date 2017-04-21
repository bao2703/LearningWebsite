<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
	protected $redirectTo = '/';

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function showRegistrationForm()
	{
		return view('auth.register');
	}

	public function register(Request $request)
	{
		$this->validator($request->all())->validate();

		$user = $this->create($request->all());

		Auth::login($user);

		return redirect()->intended(route('home'));
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|max:100|confirmed',
		]);
	}

	protected function create(array $data)
	{
		return User::create([
			'name' => $data[ 'first_name' ] . $data[ 'last_name' ],
			'email' => $data[ 'email' ],
			'password' => bcrypt($data[ 'password' ]),
		]);
	}
}
