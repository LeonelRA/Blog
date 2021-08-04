<div class="bg-white py-3 px-4 mb-4 @if($shadow) shadow-sm @endif">
	<h3 class="text-center">{{ __('Search') }}</h3>
	<hr>
	<form method="POST" action="{{ route('search') }}">
		@csrf
		<input type="text" name="search" class="form-control mb-3">
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
</div>
