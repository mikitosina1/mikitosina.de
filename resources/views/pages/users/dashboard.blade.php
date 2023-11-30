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
			@method('POST')

			<input id="id" type="hidden" name="id" value="{{ $user->id }}">
			<div class="photo">
				<img src="{{ asset('storage/profile-photos/'.$user->pic_link) }}" alt="{{ __('dashboard.alt') }}" class="mb-2">
				<input id="pic_link" type="file" class="form-control" name="pic_link" value="{{ $user->pic_link }}" lang="{{session('locale')}}">
			</div>

			<div class="fields">
				<div class="form-group row mb-2">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register.name') }}</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group row mb-2">
					<label for="sname" class="col-md-4 col-form-label text-md-right">{{ __('register.sname') }}</label>
					<div class="col-md-6">
						<input id="sname" type="text" class="form-control @error('sname') is-invalid @enderror" name="sname" value="{{ $user->sname }}" autocomplete="sname" autofocus>
						@error('sname')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group row mb-2">
					<label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('register.bio') }}</label>
					<div class="col-md-6">
						<input id="bio" type="text" class="form-control" name="bio" value="{{ $user->bio }}"  autocomplete="bio" >
					</div>
				</div>

				<div class="form-group row mt-1">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn submit">
							{{ __('dashboard.subm') }}
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection
