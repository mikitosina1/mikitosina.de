@if ($errors->any())
	<div class="alert alert-danger contact__danger">
		<ul class="my-0">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@elseif (null !== session('errors') && session('errors')->any())
	<div class="alert alert-danger contact__danger">
		<ul class="my-0">
			@foreach (session('errors')->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success success__message">
		{{ session('success') }}
	</div>
@endif
