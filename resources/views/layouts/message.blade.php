@if($errors->any() ||session('errors'))
	<div class="alert alert-danger contact__danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>
					{{$error}}
				</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success success__message">
		{{session('success')}}
	</div>
@endif
