<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	/**
	 * Instantiate a new LoginRegisterController instance.
	 */
	public function __construct()
	{
		$this->middleware('guest')->except([
			'logout', 'dashboard'
		]);
	}

	/**
	 * Display a registration form.
	 *
	 * @return View
	 */
	public function ShowRegisterForm(): View
	{
		return view('pages.users.register');
	}

	/**
	 * Store a new user.
	 *
	 * @param Request $request
	 * @return Response|RedirectResponse
	 */
	public function createNewUser (Request $request): Response|RedirectResponse
	{
		$request->validate([
			'name' => 'required|string|max:250|min:3',
			'email' => 'required|email|max:250|unique:users',
			'password' => 'required|min:8|confirmed'
		]);

		$profPhoto = 'profile-photos/defUser.jpg';
		$photo = '';
		if ($request->hasFile('profile_photo')) {
			$photo = $request->file('profile_photo');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
			$profPhoto = 'profile-photos/' . $filename;
		}

		$user = new User();
		$user->create([
			'email'             => $request->email,
			'name'              => $request->name,
			'sname'             => $request->sname,
			'bio'               => $request->bio,
			'password'          => $request->password,
			'pic_link'          => $profPhoto,
			'email_verified_at' => '',
			'role'              => '11',
			'visitor'           => '0'
		]);

		$user->save();
		if ($user->save())
			$photo->storeAs('profile-photos', $filename, 'public'); // 'public' is the disk name defined in config/filesystems.php

		$credentials = $request->only('email', 'password');
		$auth = new Auth();
		$auth->attempt($credentials);
		$request->session()->regenerate();
		return redirect()->route('home')->withSuccess('Registering was successfully. You\'re logged in!');
	}

	/**
	 * Display a login form.
	 *
	 * @return View
	 */
	public function ShowLoginForm(): View
	{
		return view('pages.users.login');
	}

	/**
	 * Authenticate the user.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function authenticate(Request $request)
	{
		$credentials = $request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		if(Auth::attempt($credentials))
		{
			$request->session()->regenerate();
			return redirect()->route('dashboard')
				->withSuccess('You have successfully logged in!');
		}

		return back()->withErrors([
			'email' => 'Your provided credentials do not match in our records.',
		])->onlyInput('email');
	}

	/**
	 * Display a dashboard to authenticated users.
	 * @return View|RedirectResponse
	 */
	public function dashboard(): View|RedirectResponse
	{
		if(Auth::check())
		{
			return view('auth.dashboard');
		}

		return redirect()->route('login')
			->withErrors([
			'email' => 'Please login to access the dashboard.',
		])->onlyInput('email');
	}

	/**
	 * Log out the user from application.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function logout(Request $request): mixed
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('login')
			->withSuccess('You have logged out successfully!');
	}
}
