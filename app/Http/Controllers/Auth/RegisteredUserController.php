<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('pages.users.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws ValidationException
	 */
	public function store(Request $request): RedirectResponse
	{
		try {
			$request->validate($this->getValidationRules());

			$photo = $this->handleProfilePhoto($request);
			$data = $this->prepareUserData($request, $photo);

			$user = new User();
			$user->create($data);

			event(new Registered($user));

			Auth::login($user);

			return redirect(RouteServiceProvider::HOME)->with('success', trans('auth.registered'));
		} catch (ValidationException $e) {
			return back()->withErrors($e->validator->errors())->withInput();
		}
	}

	/**
	 * getValidationRules
	 * -----------------------------------------------------------------------------------------------------------------
	 * gives rules for validation
	 * @return array
	 */
	public function getValidationRules(): array
	{
		return [
			'name' => 'required|string|max:250|min:3',
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],

		];
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
}
