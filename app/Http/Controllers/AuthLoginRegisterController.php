<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthLoginRegisterController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNewUser (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250|min:3',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

	    $filename = '';
	    if ($request->hasFile('profile_photo')) {
		    $photo = $request->file('profile_photo');
		    $filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
		    $photo->storeAs('profile-photos', $filename, 'public'); // 'public' is the disk name defined in config/filesystems.php

	    }

        $user = Users::create([
            'email'             => $request->email,
	        'name'              => $request->name,
	        'sname'             => $request->sname,
	        'bio'               => $request->bio,
	        'password'          => $request->password,
			'pic_link'          => 'profile-photos/' . $filename,
	        'email_verified_at' => '',
	        'role'              => '11',
	        'visitor'           => '0'

        ]);
//	    $user->profile_photo = 'profile-photos/' . $filename;
	    $user->save();

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('Registering was successfully. You\'re logged in!');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
     *
     */
    public function dashboard()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}
