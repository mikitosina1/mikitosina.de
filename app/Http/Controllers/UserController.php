<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
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
			'logout', 'dashboard', 'updateUser'
		]);
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
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
			$profPhoto = $filename;
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

		return redirect()->route('home')->withSuccess('Registering was successfully. Now you can to log in!');
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
		if(Auth::attempt($credentials))
		{
			$request->session()->regenerate();
			$request->session()->put($credentials['email']);
			return redirect()->route('home')
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
			$user = Auth::getUser();
			return view('pages.users.dashboard', ['user' => $user]);
		}

		return redirect()->route('login')
			->withErrors([
			'email' => 'Please login to access the dashboard.',
		])->onlyInput('email');
	}

	/**
	 * Update user information from dashboard
	 * @param Request
	 * @return View|RedirectResponse
	 * @throws ValidationException
	 */
	public function updateUser(Request $request): View|RedirectResponse
	{
		$this->validate($request, [
			'id' => 'required|exists:users,id',
			'name' => 'required|string|max:255',
			'sname' => 'required|string|max:255',
			'pic_link' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$user = User::findOrFail($request->input('id'));

		if ($request->hasFile('pic_link')) {
			$photo = $request->file('pic_link');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();

			if ($user->pic_link) {
				Storage::delete('public/profile-photos/' . $user->pic_link);
			}

			$photo->storeAs('public/profile-photos', $filename);
			$user->pic_link = $filename;
		}

		$user->update($request->except(['_token', '_method', 'pic_link']));

		$success = trans('dashboard.success');
		return redirect()->route('dashboard')->withSuccess($success);
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
