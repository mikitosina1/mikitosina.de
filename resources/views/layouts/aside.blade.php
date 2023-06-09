@section('aside')

<div class="hhamburger">
	<div class="hamburger__box" title="toggle menu">
		<div class="hamburger__line first change"></div>
		<div class="hamburger__line second change"></div>
		<div class="hamburger__line third change"></div>
	</div>
</div>
<div class="aside" id="navigation">
	<a href="/" class="aside__header">
		<div class="header__logo">
			<picture>
				<source srcset="/svg/bear.svg" type="image/svg+xml" media="(width: 600px;height: 600px;)">
				<img src="/svg/bear.svg" alt="bear.svg">
			</picture>
		</div>
		<div class="header__name">
			<h5>mikitosina's blog</h5>
		</div>
	</a>
	<hr>
	<div class="hamburger" aria-label="Menu" role="button" aria-controls="navigation">
		<div class="hamburger__box">
			<div class="hamburger__line first change"></div>
			<div class="hamburger__line second change"></div>
			<div class="hamburger__line third change"></div>
		</div>
	</div>
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link active" href="{{route('home')}}"><img src="/svg/home.svg" class="nav__img" alt="home.svg">Home page</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('add_news')}}"><img src="/svg/article.svg" class="nav__img" alt="article.svg">Add news</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('about')}}"><img src="/svg/author.svg" class="nav__img" alt="author.svg">About author</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('contact_me')}}"><img src="/svg/contact_me.svg" class="nav__img" alt="contact_me.svg">Mail author</a>
		</li>
		@if(isset(Auth::user()->email) && Auth::user()->role == 9)
		<li class="nav-item">
			<a class="nav-link" href="{{route('contact_data')}}"><img src="/svg/mail.svg" class="nav__img" alt="mail.svg">Сообщения</a>
		</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('team_vacations')}}"><img src="/svg/table_view.svg" class="nav__img" alt="table_view.svg">Таблица отпусков</a>
			</li>
		@endif
		<li class="nav-item">
			<a class="nav-link" href="{{route('homework')}}"><img src="/svg/hw.svg" class="nav__img" alt="home.svg">Programming practice</a>
		</li>
	</ul>
	<div class="where__am__I">@yield('where__am__I')</div>
	@include('layouts.messages')
	<svg class='form1' viewBox='0 0 339 224' fill='none' xmlns='http://www.w3.org/2000/svg'>
		<rect class='form1__circle' x='60.75' y='60.9605' width='158.289' height='158.289' rx='79.1447' stroke='#453E7B' stroke-width='1.5'>
		</rect>
		<rect class='form1__star__rect_1' x='0.473934' y='0.979117' width='76.9948' height='76.9948' transform='matrix(0.935716 0.352754 -0.303804 0.952735 207.617 37.9725)' stroke='#453E7B' stroke-width='1.5'/>
		<rect class='form1__star__rect_2' x='190.385' y='53.4564' width='78.5' height='78.5' transform='rotate(-4.14013 190.385 53.4564)' stroke='#453E7B' stroke-width='1.5'/>
		<rect class='form1__star__rect_3' x='-0.166038' y='1.04083' width='77.2124' height='77.2124' transform='matrix(0.59195 0.805975 -0.813333 0.581798 241.798 34.5691)' stroke='#453E7B' stroke-width='1.5'/>
		<g filter='url(#filter0_f_2:7)'>
			<line class='form1__navbar_line' x1='4.76111' y1='219.561' x2='334.761' y2='40.0871' stroke='#453E7B'/>
		</g>
		<defs>
			<filter id='filter0_f_2:7' x='0.522228' y='35.6478' width='338.478' height='188.352' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'>
				<feFlood flood-opacity='0' result='BackgroundImageFix'/>
				<feBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/>
				<feGaussianBlur stdDeviation='2' result='effect1_foregroundBlur_2:7'/>
			</filter>
		</defs>
	</svg>
</div>
