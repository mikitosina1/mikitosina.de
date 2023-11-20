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
	<a class="nav_item" href="{{ route('home') }}">@lang('aside.home')</a>
	<a class="nav_item" href="{{ route('test') }}">@lang('aside.test_works')</a>
	<a class="nav_item" href="{{ route('about') }}">@lang('aside.about')</a>
</div>
