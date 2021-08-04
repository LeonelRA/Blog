@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="shadow-sm bg-white rounded p-5 mt-4">

                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $user->profileImage }}" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h2>{{ $user->username }}</h2>
                        <hr>
                        <p>{{ $user->profile->description }}</p>
                    </div>
                </div>
                <hr>
                <div class="mt-4">

                    @include('components.posts.list', ['posts' => $user->posts()->public()->paginate(8)])
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
