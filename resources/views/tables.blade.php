@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         	<div class="col-md-12 col-lg-10 bg-white rounded p-5 mt-4">

                <h2 class="text-center">{{ __("All {$type}") }}</h2>

                @if($type == 'categories')
                    @include('components.tables.create', ['title' => 'Name', 'route' => 'category.store'])

                @elseif($type == 'tags')
                    @include('components.tables.create', ['title' => 'Name', 'route' => 'tag.store'])

                @elseif($type == 'posts')
                    @include('components.tables.create', ['title' => 'Title', 'route' => 'post.store'])

                @endif


                <hr>

                <div>

                    @if($type !== 'comments' && $type !== 'likes')
                        @include("components.tables.{$type}")

                    @else
                        @include('components.tables.likes_comments')

                    @endif

                </div>

         	</div>
     </div>
</div>
@endsection
