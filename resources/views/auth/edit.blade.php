@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="shadow-sm bg-white rounded p-5 mt-4">

                <h2 class="text-center">{{ __('Edit profile') }}</h2>

                <form method="POST" action="{{ route('user.update', ['user' => $user->username]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="username" class="col-form-label">{{ __('Username') }}</label>

                        <div>
                            <input id="username" type="text" class="form-control border-lr @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-form-label">{{ __('Name') }}</label>

                        <div>
                            <input id="name" type="text" class="form-control border-lr @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->profile->name }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="col-form-label">{{ __('Last name') }}</label>

                        <div>
                            <input id="last_name" type="text" class="form-control border-lr @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->profile->last_name }}">

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control border-lr @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password" class="form-control border-lr @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control border-lr" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control border-lr" id="description" rows="5">{{ old('description') ?? $user->profile->description }}</textarea>
                    </div>
 
                    <div class="form-group mb-0">
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
