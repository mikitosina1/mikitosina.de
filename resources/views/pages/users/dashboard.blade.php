<!-- Styles -->
@vite(['resources/js/app.js','resources/css/users/dashboard.css'])
@extends('layouts.app')

@section('head_title')Dashboard @endsection
@section('content')
	<div class="header">
		<h2>{{__('dashboard.Dashboard')}}</h2>
	</div>
	<div class="dashboard_card">
		<form method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
			@csrf

			<div class="photo">
					<img src="{{ asset('storage/'.$user->pic_link) }}" alt="{{ __('dashboard.alt') }}">
					<div class="col-md-6">
						<input id="profile_photo" type="file" class="form-control" name="profile_photo">
					</div>
			</div>
			<div class="fields">
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register.fname') }}</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
						<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
						@enderror
					</div>
				</div>
			</div>
		</form>
	</div>
	<div>
	</div>
@endsection
