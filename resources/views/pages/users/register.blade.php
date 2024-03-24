@vite(['resources/css/users/register.css'])

@extends('layouts.app')

@section('head_title')Registration @endsection
@section('head_css')registration @endsection
@section('where__am__I')You're on registration page @endsection
@vite(['resources/js/pages/users/register.js'])
@section('content')
<div class="content__cloud">
	<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
		@csrf

		<div class="form-group row photo_block">
			<div class="btn_and_question">
				<label for="profile_photo" class="btn submit photo_button"> {{ __('dashboard.photo_button') }}
					<input id="profile_photo" type="file" class="form-control" name="profile_photo" lang="{{session('locale')}}">
				</label>
				<i class="bi bi-question-circle question_mark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('dashboard.picture_needs') }}"></i>
			</div>
			<img id="imagePreview" src="#" alt="Preview" style="display: none;">
		</div>
		<div class="main_block">
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register.name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

					@error('name')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="sname" class="col-md-4 col-form-label text-md-right">{{ __('register.sname') }}</label>

				<div class="col-md-6">
					<input id="sname" type="text" class="form-control @error('sname') is-invalid @enderror" name="sname" value="{{ old('sname') }}" required autocomplete="sname" autofocus>

					@error('sname')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
					@enderror
				</div>
			</div>


			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('register.email') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

					@error('email')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('register.pw') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

					@error('password')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('register.2pw') }}</label>

				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				</div>
			</div>

			<div class="form-group row">
				<label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('register.bio') }}</label>

				<div class="col-md-6">
					<textarea id="bio" type="text" rows="4" class="form-control @error('bio') is-invalid @enderror" name="bio" required autocomplete="bio"></textarea>

					@error('bio')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
					@enderror
				</div>
			</div>
			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="black">
						{{ __('register.subm') }}
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
