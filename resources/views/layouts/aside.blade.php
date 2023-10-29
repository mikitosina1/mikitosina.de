@section('aside')
<div class="aside" id="navigation">
	<a href="{{ route('home') }}" class="aside__header">
		<div class="header__logo">
			<picture>
				<source srcset="/svg/bear.svg" type="image/svg+xml" media="(width: 30px;height: 30px;)">
				<img src="/svg/bear.svg" alt="bear.svg">
			</picture>
		</div>
		<div class="header__name">
			mikitosina's blog
		</div>
	</a>
	<a class="nav_item" href="{{ route('home') }}">Home</a>
	<a class="nav_item" href="">Test works</a>
	<a class="nav_item" href="{{ route('about') }}">About</a>
	@if(auth()->check())
		<a class="nav_item" href="{{ route('logout') }}">
			<form method="POST" action="{{ route('logout') }}">
				@csrf
				<button type="submit" class="btn btn-primary">
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
