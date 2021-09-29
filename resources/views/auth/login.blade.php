@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="logo-wrap text-center mb-4">
                <div class="login-logo">
                    <img class="img-fluid" src="/images/ncert.png" alt="NCERT Logo">
                </div>

                <h4 class="mt-2">Diploma Course in Guidance and Counselling</h4>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h3 class="mb-0">Login</h3>
                </div>
                <div class="card-body mt-5 mb-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt mr-1"></i> {{ __('Login') }}
                                </button>
                                
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <ul class="list mt-4">
                            <h6><strong>Note:</strong></h6>
                            <li>All candidates need to <a class="font-weight-bold" href="{{ route('register') }}">create a new account</a> for filling the application form.</li>
                            <li>All correspondence related to the course will be made through the email ID created.</li>
                        </ul>
                        
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a class="font-weight-bold" href="{{ route('register') }}"><i class="fas fa-user-plus mr-1"></i>
                        {{ __('Create New Account') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection