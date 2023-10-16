@extends('layouts.login')

@section('contents')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                  <div class="card-body px-5 py-5">
                      <h3 class="card-title text-left mb-3">Lupa Password</h3>
                      <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                          @csrf
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                              <input placeholder="Email" id="email" type="email" class="form-control p_input  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="color: white">
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
                          <br>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-block enter-btn">
                                  {{ __('Send Password Reset Link') }}
                              </button>
                          </div>
                          <div class="text-center p-t-12">
                              <span class="txt1">
                                  Masukan Email Anda
                              </span>
                              <span class="txt1">
                                  / Kembali ke
                              </span>
                              <a class="txt2" href="/">
                                  Login
                              </a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


  
@endsection
