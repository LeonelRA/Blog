<form method="POST" action="{{ route($route) }}">
@csrf

<div class="form-group">
    <label for="title" class="col-form-label">{{ __($title) }}</label>

    <div class="row">
        <div class="col-md-8">
            <input id="title" type="text" class="form-control border-lr @if($errors->first()) is-invalid @endif" name="title" value="{{ old('title') }}" required>

            @if($errors->first())
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </div>                    

    </div>
</div>
</form>