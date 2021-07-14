@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="shadow-sm bg-white rounded p-5 mt-4">

                <h2 class="text-center">{{ __('Register') }}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="username" class="col-form-label">{{ __('Username') }}</label>

                        <div>
                            <input id="username" type="text" class="form-control border-lr @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control border-lr @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-control border-lr @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                            <input id="password-confirm" type="password" class="form-control border-lr" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="mt-4">
                            <button type="submit" class="btn btn-lr btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

