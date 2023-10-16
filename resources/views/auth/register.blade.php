@extends('layouts.login')

@section('contents')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Daftar</h3>
              @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
              @endif
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label>NIS</label>
                  <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus class="form-control p_input @error('username') is-invalid @enderror" style="color:white">
                  @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  @if(session('nis_not_found'))
                      <span class="text-danger">
                          {{ session('nis_not_found') }}
                      </span>
                  @endif
              </div>
              
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control p_input  @error('name') is-invalid @enderror"  id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="color:white">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control p_input @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" style="color:white">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control p_input @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password" style="color:white">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input class="form-control p_input" type="password" name="password_confirmation" required autocomplete="new-password" style="color:white">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input placeholder="Jenis Kelamin"  type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                    <label class="" for="Laki-laki">Laki-laki</label>
                    <input class="" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                    <label class="" for="Perempuan">Perempuan</label>   
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                </div>
                <p class="sign-up text-center">Sudah Punya Akun?<a href="/log">Login</a></p>
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
@push('script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
$(document).ready(function() {
    $('#username').on('change', function() {
        var username = $(this).val();

        $.ajax({
            url: '/getname/' + username,
            type: 'GET',
            success: function(response) {
                if (response && response.name) {
                    $('#name').val(response.name);
                } else {
                    $('#name').val('');
                    alert('Nama yang sesuai NIS di atas tidak ditemukan. Silahkan cek kembali NIS Anda.');
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

</script>


@endpush
