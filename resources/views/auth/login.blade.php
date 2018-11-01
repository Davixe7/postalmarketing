@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="card-title">{{ __('Ingresa ahora') }}</div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-field">
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
              <label for="email">{{ __('Email') }}</label>
              @if ($errors->has('email'))<span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong> </span>
              @endif
            </div>

            <div class="input-field">
              <input id="password" type="password" name="password" required>
              <label for="password">{{ __('Contraseña') }}</label>
              @if ($errors->has('password')) <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('password') }}</strong> </span> @endif
            </div>

            <div class="input-field">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember"> {{ __('Remember Me') }} </label>
              </div>
            </div>

            <div class="row">
              <div class="col s6">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
              </div>
              <div class="col s6 right-align">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
