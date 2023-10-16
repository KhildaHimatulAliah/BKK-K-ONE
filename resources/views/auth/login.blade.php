@extends('layouts.login')

@section('contents')
    {{-- new --}}
     <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="/log" method="post">
                  @csrf
                  @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <div class="form-group">
                    <label>Email *</label>
                    <input style="color: white" type="text" name="email" class="form-control p_input @error('email') is-invalid @enderror" >
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input style="color: white" class="form-control p_input @error('password') is-invalid @enderror" type="password" name="password">
                          @error('password')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    {{-- <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> --}}
                    <a href="forgot-password" class="forgot-pass">Lupa password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  {{-- <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> --}}
                  <p class="sign-up">Belum punya akun?<a href="register"> Daftar</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection