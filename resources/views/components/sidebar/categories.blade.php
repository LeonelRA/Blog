<div class="bg-white py-3 px-4 mb-4 @if($shadow) shadow-sm @endif">
	<h3 class="text-center">{{ __('Categories') }}</h3>
	<hr>
	<div class="list-group text-center">
		@foreach($categories as $category)
		<a href="{{ route('category.show', ['category' => $category->slug]) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
		@endforeach
	</div>
</div>