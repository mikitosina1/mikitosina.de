@section('aside')
<div class="aside" id="navigation">
	<a href="/" class="aside__header">
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
	<a class="nav_item" href="">Home</a>
	<a class="nav_item" href="">Test works</a>
	<a class="nav_item" href="">About</a>
	@auth
		<div>1</div>
	@else
	<div class="login_block">
		<a class="nav_item" href="{{ route('register') }}">Register</a> or <a class="nav_item" href="{{ route('login') }}">Login</a>
	</div>
	@endauth

</div>
