@extends('layouts.login')

@section('contents')


<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{ asset('login/images/Logo BKK.png') }}" alt="IMG">
        </div>

        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <span class="login100-form-title">
            {{ __('Reset Password') }}
          </span>
        
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
          </div>


          <div class="wrap-input100 validate-input">
            <input class="input100  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="New Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                <i class="fa fa-key" aria-hidden="true"></i>
                </span>
          </div>
          
          <div class="wrap-input100 validate-input">
            <input class="input100  @error('password') is-invalid @enderror"  id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                <i class="fa fa-key" aria-hidden="true"></i>
                </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{ __('Reset Password') }}
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Lupa
            </span>
            <a class="txt2" href="/forgot-password">
              Password?
            </a>
            <span class="txt1">
              / Belum
            </span>
            <a class="txt2" href="/register">
             Punya Akun?
            </a>
          </div>

        </form>
      </div>
    </div>
  </div>
  
@endsection
