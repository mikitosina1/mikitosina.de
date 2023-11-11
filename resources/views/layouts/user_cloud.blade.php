@section('user_cloud')
<div class="right_cloud">
	<div class="user_cloud">
		<div class="auth_btn_block">
			@if(auth()->check())
				<a href="{{ route('dashboard') }}" class="cloud_item">{{ __('user_cloud.personalPage') }}</a>
				<a class="cloud_item" href="javascript:void(0)">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<button type="submit" class="btn logout">
							{{ __('user_cloud.logout') }}
						</button>
					</form>
				</a>
			@else
				<div class="login_block">
					<a class="nav_item" href="{{ route('register') }}">{{ __('user_cloud.register') }}</a> or <a class="nav_item" href="{{ route('login') }}">{{ __('user_cloud.login') }}</a>
				</div>
			@endif
		</div>
		@include('layouts.message')
	</div>
</div>
