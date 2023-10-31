@section('user_cloud')
<div class="right_cloud">
	<div class="user_cloud">
		@if(auth()->check())
			<a class="nav_item" href="{{ route('logout') }}">
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<button type="submit" class="btn btn-primary logout">
						{{ __('aside.logout') }}
					</button>
				</form>
			</a>
		@else
			<div class="login_block">
				<a class="nav_item" href="{{ route('register') }}">Register</a> or <a class="nav_item" href="{{ route('login') }}">Login</a>
			</div>
		@endif
		@include('layouts.message')
	</div>
</div>
