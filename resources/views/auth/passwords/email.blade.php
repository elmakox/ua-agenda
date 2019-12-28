@extends('layouts.auth')

@section('content')
    <div class="text-center mb-5">
        <a href="#" class="text-dark font-size-22 font-family-secondary">
            <i class="mdi mdi-alpha-x-circle"></i> <b>UA Agenda 2063</b>
        </a>
    </div>
    <h1 class="h5 mb-1">Reset your password!</h1>
    {{--<p class="text-muted mb-4">Enter your email address and password to confirm your new password.</p>--}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" class="user">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success btn-block waves-effect waves-light"> Send Password Reset Link </button>
    </form>
@endsection
