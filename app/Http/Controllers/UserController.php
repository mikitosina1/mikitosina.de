<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
		$photo = null;
		if ($request->hasFile('profile_photo')) {
			$photo = $request->file('profile_photo');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension(); //
			$profPhoto = 'profile-photos/' . $filename;
		}
		else {
			$filename = 'defUser.jpg';
			$profPhoto = public_path('images/' . $filename);
		}

		$data = [
			'email'             => $request->email,
			'name'              => $request->name,
			'sname'             => $request->sname,
			'bio'               => $request->bio,
			'password'          => $request->password,
			'pic_link'          => $profPhoto,
			'email_verified_at' => '',
			'role'              => '11',
			'visitor'           => '0'
		];
		$user = new User();
		if ($user->create($data) && $photo)
			$photo->storeAs('profile-photos', $filename, 'public'); // 'public' is the disk name defined in config/filesystems.php

		return redirect()->route('home')->with('success', 'Registering was successfully. Now you can to log in!');
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
	 * @return mixed
	 */
	public function authenticate(Request $request): mixed
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);
		$remember = (bool)$request->get('remember');
		if(Auth::attempt($credentials, $remember))
		{
			$request->session()->regenerate();
			$request->session()->put('user', ['id' => Auth::getUser()->getAuthIdentifier(), 'mail' => $credentials['email']]);
			return redirect()->route('home')
				->with('success', 'You have successfully logged in!');
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
			->with('success', 'You have logged out successfully!');
	}

	/**
	 * Show the profile for the given user.
	 */
	public function show(Request $request, string $id): View
	{
		$value = $request->session()->get('key');

		// ...

		$user = $this->users->find($id);

		return view('user.profile', ['user' => $user]);
	}
}
