@vite(['resources/css/users/login.css'])

@extends('layouts.app')

@section('head_title')Login @endsection
@section('head_css')login @endsection
@section('where__am__I')You're on login page ^^ @endsection

@section('content')
<div class="content__cloud">
	<form method="POST" action="{{ route('authenticate') }}">
		@csrf

		<div class="form-group row">
			<label for="email" class="col-md-4 col-form-label text-md-right">@lang('register.email')</label>

			<div class="col-md-6">
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-md-4 col-form-label text-md-right">@lang('register.pw')</label>

			<div class="col-md-6">
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-6 offset-md-4">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

					<label class="form-check-label" for="remember">
						@lang('register.remember')
					</label>
				</div>
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="black">
					{{ __('Login') }}
				</button>

				@if (Route::has('password.request'))
					<a class="btn btn-link" href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
				@endif
			</div>
		</div>
	</form>
</div>
@endsection
