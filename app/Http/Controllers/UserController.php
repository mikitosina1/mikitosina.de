<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
	 * createNewUser
	 * -----------------------------------------------------------------------------------------------------------------
	 * Store a new user.
	 *
	 * @param Request $request
	 * @return Response|RedirectResponse
	 */
	public function createNewUser(Request $request): Response|RedirectResponse
	{
		$request->validate([
			'name' => 'required|string|max:250|min:3',
			'email' => 'required|email|max:250|unique:users',
			'password' => 'required|min:8|confirmed'
		]);

		$photo = $this->handleProfilePhoto($request);
		$data = $this->prepareUserData($request, $photo);

		$user = new User();
		$user->create($data);
		$user->sendEmailVerificationNotification();

		return redirect()->route('home')->withSuccess('Registering was successful. Now you can log in!');
	}

	/**
	 * handleProfilePhoto
	 * -----------------------------------------------------------------------------------------------------------------
	 * prepares way for photo and stores pic, if its exists
	 *
	 * @param Request $request
	 * @return ?string
	 */
	private function handleProfilePhoto(Request $request): ?string
	{
		if ($request->hasFile('profile_photo')) {
			$photo = $request->file('profile_photo');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
			$photo->storeAs('profile-photos', $filename, 'public');
			return $filename;
		} else {
			return 'defUser.jpg';
		}
	}

	/**
	 * prepareUserData
	 * -----------------------------------------------------------------------------------------------------------------
	 * prepares array of data for register new user
	 *
	 * @param Request $request
	 * @param string|null $photo
	 * @return array
	 */
	private function prepareUserData(Request $request, ?string $photo): array
	{
		return [
			'email' => $request->email,
			'name' => $request->name,
			'sname' => $request->sname,
			'bio' => $request->bio,
			'password' => $request->password,
			'pic_link' => $photo ? public_path('images/' . $photo) : null,
			'email_verified_at' => null,
			'visitor' => '0'
		];
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
	 * @param Request $request
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
