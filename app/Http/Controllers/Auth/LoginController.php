<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => 'logout']);
    }

	public function getLogin()
	{
		return view('client.auth.login');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);
		$credentials = ['email' => $request->email, 'password' => $request->password];
		// TODO: check role here
		if (Auth::guard('web')->attempt($credentials, false)) {
			return redirect()->intended(route('project.index'));
		}

		return redirect()->back();
	}
}
