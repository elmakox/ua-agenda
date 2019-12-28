@extends('layouts.auth')

@section('content')
    <div class="text-center mb-5">
        <a href="#" class="text-dark font-size-22 font-family-secondary">
            <i class="mdi mdi-alpha-x-circle"></i> <b>UA Agenda 2063</b>
        </a>
    </div>
    <h1 class="h5 mb-1">Welcome Back!</h1>
    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
    <form class="user" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="custom-control custom-checkbox custom-control-inline mb-3">
            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
        </div>
        <button type="submit" class="btn btn-dark btn-block waves-effect waves-light"> Log In </button>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p class="text-muted mb-2">
                    @if (Route::has('password.request'))
                        <a class="text-muted font-weight-medium ml-1" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </p>
            </div>
        </div>
    </form>
@endsection
