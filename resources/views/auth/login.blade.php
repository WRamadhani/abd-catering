@extends('templates.app')
<nav class="navbar navbar-expand navbar-dark bg-hitam">
  <a class="navbar-brand flex-md-column flex-row _brand" href="{{ route('home') }}">
      <span class="lead logo">ABD CATERING</span>
  </a>
</nav>
@section('content')
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
        </div>
        @endif
<div class="card border-kuning">
    <div class="card-header bg-pink">{{ __('Sign In') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="login" class="col-sm-4 col-form-label text-md-right">
                    {{ __('Username') }}
                </label>
                <div class="col-md-6">
                    <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }} input-pink"
                    name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                    @if ($errors->has('username') || $errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-pink" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-pink">
                    {{ __('Sign In') }}
                    </button>
                    <a href="{{ route('register') }}" class="btn btn-info">{{ __('Register') }}</a>
                    {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link pl-1" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection