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
    <div class="card-header bg-pink">{{ __('Register') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Userame') }}</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror input-pink" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-pink" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control input-pink" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-pink">
                    {{ __('Register') }}
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-info">{{ __('Login') }}</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection