@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-8">

			<div class="card">
				<div class="card-header">
					{{ __('Setting') }}
				</div>
				<div class="card-body">
				  	<div class="list-group text-center">
				  		<a href="{{ route('admin.user') }}" class="list-group-item list-group-item-action">
				  			{{ __('All users') }}
				  		</a>
				  		<a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">
				  			{{ __('All posts') }}
				  		</a>
				  		<a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">
				  			{{ __('All categories') }}
				  		</a>
				  		<a href="{{ route('tag.index') }}" class="list-group-item list-group-item-action">
				  			{{ __('All tags') }}
				  		</a>
				  	</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
