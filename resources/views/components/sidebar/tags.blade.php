<div class="bg-white py-3 px-4 @if($shadow) shadow-sm @endif">
	<h3 class="text-center">{{ __('Tags') }}</h3>
	<hr>
	<div>
		@foreach($tags as $tag)
			<a href="{{ route('tag.show', ['tag' => $tag->slug]) }}" class="btn btn-primary mb-2" role="button">{{ $tag->name }}</a>
		@endforeach
	</div>
</div>