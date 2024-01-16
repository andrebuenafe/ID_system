@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="logo">
        <img id="cdl-logo" src="{{asset('img/System-Logo.png')}}" alt="CDL LOGO">
    </div>
    <div class="header-text">
        <p>Login</p>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="email-contianer">
            <label for="email" id="email-label">Email:</label>
            <div class="input-email">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email-input" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" 
                required autocomplete="email" autofocus placeholder="Enter your Email">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            
            <div class="row mb-3 mt-3">
                <label for="password" id="password-label">Password:</label>

                <div class="input-pass">
                    <i class="fa-solid fa-lock"></i>
                    <input id="password-input" type="password" class="@error('password') is-invalid @enderror" name="password" 
                    required autocomplete="current-password" placeholder="Enter your Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="remember-me-cont">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>


            <div class="row mb-0">
                <div class="col-md-8 btn-login">
                    
                    <button type="submit" class="btn btn-bg">
                        <i class="fa-solid fa-key"></i>
                        Login
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-forget-pass" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif 
                </div>
            </div>

        </div>
    </form>
</div>

@endsection