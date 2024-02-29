@extends('layouts.app')
@vite(['resources/css/pages/test.css'])

@section('head_title')Test page @endsection
@section('content')
<div class="content__cloud">
	<form method="POST" action="{{ route('generateExperiencePdf') }}">
		@csrf
		<div class="form-group row mb-0">
			<button type="submit" class="black">
				@lang('pdf.get_test')
			</button>
		</div>
	</form>
</div>
@endsection
