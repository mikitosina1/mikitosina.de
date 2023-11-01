@section('user_cloud')
<div class="right_cloud">
	<div class="user_cloud">
		@if(auth()->check())
			<a class="nav_item" href="{{ route('logout') }}">
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<button type="submit" class="btn btn-primary logout">
						{{ __('user_cloud.logout') }}
					</button>
				</form>
			</a>
		@else
			<div class="login_block">
				<a class="nav_item" href="{{ route('register') }}">{{ __('user_cloud.register') }}</a> or <a class="nav_item" href="{{ route('login') }}">{{ __('user_cloud.login') }}</a>
			</div>
		@endif
		@include('layouts.message')
	</div>
</div>
