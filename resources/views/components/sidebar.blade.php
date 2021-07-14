	<div class="bg-white py-3 px-4 mb-4 shadow-sm">
		<h3 class="text-center">{{ __('Search') }}</h3>
		<hr>
		<form method="POST" action="{{ route('search') }}">
			@csrf
			<input type="text" name="search" class="form-control mb-3">
			<button type="submit" class="btn btn-lr">Search</button>
		</form>
	</div>

	<div class="bg-white py-3 px-4 mb-4 shadow-sm">
		<h3 class="text-center">{{ __('Categories') }}</h3>
		<hr>
		<div class="list-group text-center">
			@foreach($categories as $category)
			<a href="{{ route('category.show', ['category' => $category->name]) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
			@endforeach
		</div>
	</div>

	<div class="bg-white py-3 px-4 shadow-sm">
		<h3 class="text-center">{{ __('Tags') }}</h3>
		<hr>
		@foreach($tags as $tag)
		<a href="{{ route('tag.show', ['tag' => $tag->name]) }}" class="btn btn-lr mb-2">{{ $tag->name }}</a>
		@endforeach
	</div>